<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
class BoardController extends Controller
{
    public function index()
    {
        $commissions = Commission::where('artist_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.board.index', compact('commissions'));
    }

    public function update(Request $request, Commission $commission)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:pending,sketching,inking,coloring,final_review'],
            'position' => ['required', 'integer'],
        ]);

        $commission->update($validated);

        // Update positions of other commissions in the same status
        if ($request->has('order')) {
            foreach ($request->order as $item) {
                Commission::where('id', $item['id'])
                    ->update(['position' => $item['position']]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Commission status and position updated successfully'
        ]);
    }
}
