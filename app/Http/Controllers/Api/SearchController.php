<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SearchHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Log a search and return combined results for Disease, Doctor, Hospital, Pharmacy.
     */
    public function search(Request $request)
    {
        $request->validate(['q' => 'required|string|min:2']);
        $keyword = $request->q;

        // Log to search history
        SearchHistory::create([
            'user_id' => Auth::id(),
            'keyword' => $keyword,
        ]);

        $diseases = \App\Models\Disease::with('symptoms')
            ->where('name', 'like', "%$keyword%")
            ->limit(5)->get();

        $symptoms = \App\Models\Symptom::where('name', 'like', "%$keyword%")->limit(5)->get();

        $doctors = \App\Models\Doctor::where('name', 'like', "%$keyword%")
            ->orWhere('specialization', 'like', "%$keyword%")
            ->limit(5)->get();

        $hospitals = \App\Models\Hospital::where('name', 'like', "%$keyword%")->limit(5)->get();

        $pharmacies = \App\Models\Pharmacy::where('name', 'like', "%$keyword%")->limit(5)->get();

        $medicines = \App\Models\Medicine::where('brand_name', 'like', "%$keyword%")
            ->orWhere('generic_name', 'like', "%$keyword%")
            ->limit(5)->get();

        return response()->json(compact('diseases', 'symptoms', 'doctors', 'hospitals', 'pharmacies', 'medicines'));
    }

    /**
     * Get the authenticated user's search history
     */
    public function history()
    {
        $history = SearchHistory::where('user_id', Auth::id())
            ->latest()
            ->take(20)
            ->get();

        return response()->json($history);
    }
}
