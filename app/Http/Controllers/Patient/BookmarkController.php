<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Auth::user()->bookmarks()->with('bookmarkable')->paginate(20);
        return view('patient.bookmarks.index', compact('bookmarks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bookmarkable_id' => 'required',
            'bookmarkable_type' => 'required|string',
        ]);

        Auth::user()->bookmarks()->updateOrCreate([
            'bookmarkable_id' => $data['bookmarkable_id'],
            'bookmarkable_type' => $data['bookmarkable_type'],
        ]);

        return redirect()->back()->with('success', 'Bookmarked successfully.');
    }

    public function destroy(Bookmark $bookmark)
    {
        if ($bookmark->user_id !== Auth::id()) {
            abort(403);
        }

        $bookmark->delete();

        return redirect()->back()->with('success', 'Bookmark removed.');
    }
}
