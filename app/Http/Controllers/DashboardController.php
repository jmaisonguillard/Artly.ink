<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Commission;
class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->is_artist) {
            $commissions = Commission::where('artist_id', $user->id)
                ->with(['client', 'service'])
                ->latest()
                ->paginate(10);
        } else {
            $commissions = Commission::where('client_id', $user->id)
                ->with(['artist', 'service'])
                ->latest()
                ->paginate(10);
        }

        return view('dashboard.dashboard', compact('commissions'));
    }

    public function settings()
    {
        return view('dashboard.settings');
    }

    public function commissionServices()
    {
        $services = Service::where('user_id', auth()->id())->paginate(20);

        return view('dashboard.services', compact('services'));
    }

    public function createService()
    {
        return view('dashboard.services.create');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'currency' => 'required|string|in:USD,EUR,GBP,CAD,AUD,JPY',
            'turnaround_time' => 'required|integer|min:1',
            'tags' => 'nullable|string',
            'categories' => 'required|array|min:1',
            'categories.*' => 'string|in:illustration,character_design,reference_sheet,concept_art,animation,emotes,pixel_art,chibi,vtuber,other',
            'examples.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'options' => 'nullable|array',
            'options.*' => 'string|in:revisions,commercial_use,source_files',
            'is_active' => 'required|boolean',
        ]);

        // Process tags from comma-separated string to array
        $tags = array_map('trim', explode(',', $validated['tags'] ?? ''));
        $tags = array_filter($tags); // Remove empty tags

        // Handle file uploads
        $exampleImages = [];
        if ($request->hasFile('examples')) {
            foreach ($request->file('examples') as $image) {
                $path = $image->store('service-examples', 'public');
                $exampleImages[] = $path;
            }
        }

        // Create the service
        $service = new Service([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'base_price' => $validated['base_price'],
            'currency' => $validated['currency'],
            'turnaround_time' => $validated['turnaround_time'],
            'tags' => $tags,
            'categories' => $validated['categories'],
            'example_images' => $exampleImages,
            'options' => $validated['options'] ?? [],
            'is_active' => $validated['is_active'],
            'user_id' => auth()->id(),
        ]);

        $service->save();

        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    public function editService(Service $service)
    {
        return view('dashboard.services.create', compact('service'));
    }

    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'currency' => 'required|string|in:USD,EUR,GBP,CAD,AUD,JPY',
            'turnaround_time' => 'required|integer|min:1',
            'tags' => 'nullable|string',
            'categories' => 'required|array|min:1',
            'categories.*' => 'string|in:illustration,character_design,reference_sheet,concept_art,animation,emotes,pixel_art,chibi,vtuber,other',
            'examples.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'options' => 'nullable|array',
            'options.*' => 'string|in:revisions,commercial_use,source_files',
            'is_active' => 'required|boolean',
        ]);

        // Process tags from comma-separated string to array
        $tags = array_map('trim', explode(',', $validated['tags'] ?? ''));
        $tags = array_filter($tags); // Remove empty tags

        // Handle file uploads
        $exampleImages = [];
        if ($request->hasFile('examples')) {
            foreach ($request->file('examples') as $image) {
                $path = $image->store('service-examples', 'public');
                $exampleImages[] = $path;
            }
        }

        $service->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'base_price' => $validated['base_price'],
            'currency' => $validated['currency'],
            'turnaround_time' => $validated['turnaround_time'],
            'tags' => $tags,
            'categories' => $validated['categories'],
            'example_images' => $exampleImages,
            'options' => $validated['options'] ?? [],
            'is_active' => $validated['is_active'],
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    public function destroyService(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}
