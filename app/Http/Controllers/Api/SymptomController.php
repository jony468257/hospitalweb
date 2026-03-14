<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index(Request $request)
    {
        $query = Symptom::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:symptoms',
            'description' => 'nullable|string',
        ]);

        return response()->json(Symptom::create($data), 201);
    }

    public function update(Request $request, $id)
    {
        $symptom = Symptom::findOrFail($id);

        $data = $request->validate([
            'name'        => 'sometimes|string|max:255|unique:symptoms,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $symptom->update($data);
        return response()->json($symptom);
    }

    public function destroy($id)
    {
        Symptom::findOrFail($id)->delete();
        return response()->json(['message' => 'Symptom deleted successfully.']);
    }
}
