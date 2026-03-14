<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index(Request $request)
    {
        $query = Disease::with(['symptoms', 'medicines']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->paginate(15));
    }

    public function show($slug)
    {
        $disease = Disease::with(['symptoms', 'medicines'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($disease);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:diseases',
            'slug'        => 'required|string|unique:diseases',
            'description' => 'nullable|string',
            'overview'    => 'nullable|string',
        ]);

        $disease = Disease::create($data);

        if ($request->has('symptom_ids')) {
            $disease->symptoms()->sync($request->symptom_ids);
        }

        if ($request->has('medicine_ids')) {
            $disease->medicines()->sync($request->medicine_ids);
        }

        return response()->json($disease->load(['symptoms', 'medicines']), 201);
    }

    public function update(Request $request, $id)
    {
        $disease = Disease::findOrFail($id);

        $data = $request->validate([
            'name'        => 'sometimes|string|max:255|unique:diseases,name,' . $id,
            'slug'        => 'sometimes|string|unique:diseases,slug,' . $id,
            'description' => 'nullable|string',
            'overview'    => 'nullable|string',
        ]);

        $disease->update($data);

        if ($request->has('symptom_ids')) {
            $disease->symptoms()->sync($request->symptom_ids);
        }

        if ($request->has('medicine_ids')) {
            $disease->medicines()->sync($request->medicine_ids);
        }

        return response()->json($disease->load(['symptoms', 'medicines']));
    }

    public function destroy($id)
    {
        Disease::findOrFail($id)->delete();
        return response()->json(['message' => 'Disease deleted successfully.']);
    }

    /**
     * Search diseases by one or more symptom IDs
     * GET /api/diseases/by-symptoms?symptom_ids[]=1&symptom_ids[]=2
     */
    public function bySymptoms(Request $request)
    {
        $request->validate([
            'symptom_ids'   => 'required|array',
            'symptom_ids.*' => 'integer|exists:symptoms,id',
        ]);

        $diseases = Disease::with(['symptoms', 'medicines'])
            ->whereHas('symptoms', function ($q) use ($request) {
                $q->whereIn('symptoms.id', $request->symptom_ids);
            })
            ->get();

        return response()->json($diseases);
    }
}
