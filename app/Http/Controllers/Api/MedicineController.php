<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(Request $request)
    {
        $query = Medicine::query();

        if ($request->filled('search')) {
            $query->where('brand_name', 'like', '%' . $request->search . '%')
                  ->orWhere('generic_name', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->paginate(20));
    }

    public function show($id)
    {
        return response()->json(Medicine::findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'brand_name'  => 'required|string|max:255',
            'generic_name'=> 'required|string|max:255',
            'dosage'      => 'nullable|string|max:100',
            'strength'    => 'nullable|string|max:100',
            'type'        => 'nullable|string|max:100',
        ]);

        return response()->json(Medicine::create($data), 201);
    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $data = $request->validate([
            'brand_name'  => 'sometimes|string|max:255',
            'generic_name'=> 'sometimes|string|max:255',
            'dosage'      => 'nullable|string|max:100',
            'strength'    => 'nullable|string|max:100',
            'type'        => 'nullable|string|max:100',
        ]);

        $medicine->update($data);
        return response()->json($medicine);
    }

    public function destroy($id)
    {
        Medicine::findOrFail($id)->delete();
        return response()->json(['message' => 'Medicine deleted successfully.']);
    }
}
