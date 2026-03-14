<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())
            ->with(['disease', 'doctor'])
            ->get();

        return response()->json($bookmarks);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'disease_id' => 'nullable|exists:diseases,id',
            'doctor_id'  => 'nullable|exists:doctors,id',
        ]);

        if (empty($data['disease_id']) && empty($data['doctor_id'])) {
            return response()->json(['message' => 'Provide either disease_id or doctor_id.'], 422);
        }

        $bookmark = Bookmark::firstOrCreate([
            'user_id'    => Auth::id(),
            'disease_id' => $data['disease_id'] ?? null,
            'doctor_id'  => $data['doctor_id'] ?? null,
        ]);

        return response()->json($bookmark, 201);
    }

    public function destroy($id)
    {
        $bookmark = Bookmark::where('user_id', Auth::id())->findOrFail($id);
        $bookmark->delete();
        return response()->json(['message' => 'Bookmark removed.']);
    }
}
