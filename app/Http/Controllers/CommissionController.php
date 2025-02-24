<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommissionController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->is_artist) {
            $commissions = Commission::where('artist_id', $user->id)
                ->with(['client', 'service'])
                ->latest()
                ->get();
        } else {
            $commissions = Commission::where('client_id', $user->id)
                ->with(['artist', 'service'])
                ->latest()
                ->get();
        }

        return view('commissions.index', compact('commissions'));
    }

    public function create(Service $service)
    {
        return view('commissions.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf|max:10240'
        ]);

        // Handle file uploads
        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('commission-attachments', 'public');
                $attachments[] = $path;
            }
        }

        $commission = Commission::create([
            'client_id' => auth()->id(),
            'artist_id' => $service->user_id,
            'service_id' => $service->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $service->base_price,
            'currency' => $service->currency,
            'requirements' => $validated['requirements'] ?? [],
            'attachments' => $attachments,
            'due_date' => now()->addDays($service->turnaround_time),
            'status' => 'pending'
        ]);

        return redirect()->route('commissions.show', $commission)
            ->with('success', 'Commission request submitted successfully!');
    }

    public function update(Request $request, Commission $commission)
    {
        $request->user()->can('update', $commission);

        $commission->update($request->all());
        return redirect()->back()->with('success', 'Commission updated successfully!');
    }

    public function showData(Request $request, Commission $commission)
    {
        $request->user()->can('view', $commission);

        $commission->load(['client', 'artist', 'service']);
        return response()->json($commission);
    }

    public function show(Request $request, Commission $commission)
    {
        $request->user()->can('view', $commission);

        $commission->load(['client', 'artist', 'service']);
        return view('dashboard.commissions.show', compact('commission'));
    }

    public function updateFromModal(Request $request, Commission $commission)
    {
        $request->user()->can('update', $commission);

        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'due_date' => 'required|date',
                'priority' => 'required|in:low,medium,high',
                'description' => 'nullable|string',
                'notes' => 'nullable|array',
                'notes.*' => 'string'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $e->errors()
            ], 422);
        }

        // First update the basic fields
        $commission->title = $validated['title'];
        $commission->due_date = $validated['due_date'];
        $commission->priority = $validated['priority'];
        $commission->description = $validated['description'];
        $commission->notes = $validated['notes'] ?? [];

        // Save the changes
        $commission->save();

        return response()->json([
            'success' => true,
            'message' => 'Commission updated successfully',
            'commission' => $commission
        ]);
    }

    public function updateStatus(Request $request, Commission $commission)
    {
        $request->user()->can('update', $commission);

        $validated = $request->validate([
            'status' => 'required|in:pending,sketching,inking,coloring,final_review,completed,cancelled',
            'message' => 'nullable|string'
        ]);

        $commission->status = $validated['status'];

        if ($validated['status'] === 'completed') {
            $commission->completed_at = now();
        }

        // Add progress update if message provided
        if (!empty($validated['message'])) {
            $progress_updates = $commission->progress_updates ?? [];
            $progress_updates[] = [
                'status' => $validated['status'],
                'message' => $validated['message'],
                'timestamp' => now()->toDateTimeString(),
                'user_id' => auth()->id()
            ];
            $commission->progress_updates = $progress_updates;
        }

        $commission->save();

        return redirect()->back()
            ->with('success', 'Commission status updated successfully!');
    }

    public function addProgressUpdate(Request $request, Commission $commission)
    {
        $request->validate([
            'status' => 'required|in:sketching,inking,coloring,final_review,completed',
            'message' => 'required|string',
            'images.*' => 'nullable|image|max:5120' // 5MB max per image
        ]);

        // Handle image uploads
        $imageUrls = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('commission-updates', 'public');
                $imageUrls[] = Storage::url($path);
            }
        }

        // Get existing progress updates or initialize empty array
        $progress_updates = $commission->progress_updates ?? [];

        // Add new update
        $progress_updates[] = [
            'status' => $request->status,
            'message' => $request->message,
            'images' => $imageUrls,
            'timestamp' => now()->toDateTimeString(),
            'user_id' => auth()->id()
        ];

        // Update commission status and progress
        $commission->status = $request->status;
        if ($request->status === 'completed') {
            $commission->completed_at = now();
        }
        $commission->progress_updates = $progress_updates;
        $commission->save();

        return redirect()->back()->with('success', 'Progress update added successfully!');
    }
}
