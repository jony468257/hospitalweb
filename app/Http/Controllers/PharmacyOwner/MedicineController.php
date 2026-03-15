<?php

namespace App\Http\Controllers\PharmacyOwner;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\PharmacyMedicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    public function index()
    {
        $pharmacyIds = Auth::user()->pharmacies()->pluck('id');
        $medicines = PharmacyMedicine::whereIn('pharmacy_id', $pharmacyIds)
            ->with(['pharmacy', 'medicine'])
            ->paginate(15);

        return view('pharmacy-owner.medicines.index', compact('medicines'));
    }

    public function create()
    {
        $pharmacies = Auth::user()->pharmacies;
        $allMedicines = Medicine::all();
        return view('pharmacy-owner.medicines.create', compact('pharmacies', 'allMedicines'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pharmacy_id' => 'required|exists:pharmacies,id',
            'medicine_id' => 'required|exists:medicines,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        // Ownership check
        $pharmacy = Pharmacy::findOrFail($data['pharmacy_id']);
        if ($pharmacy->user_id !== Auth::id()) {
            abort(403);
        }

        PharmacyMedicine::create($data);

        return redirect()->route('pharmacy-owner.medicines.index')->with('success', 'Medicine added to inventory.');
    }

    public function edit(PharmacyMedicine $medicine)
    {
        // Ownership check
        if ($medicine->pharmacy->user_id !== Auth::id()) {
            abort(403);
        }

        $pharmacies = Auth::user()->pharmacies;
        $allMedicines = Medicine::all();
        return view('pharmacy-owner.medicines.edit', compact('medicine', 'pharmacies', 'allMedicines'));
    }

    public function update(Request $request, PharmacyMedicine $medicine)
    {
        // Ownership check
        if ($medicine->pharmacy->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'pharmacy_id' => 'required|exists:pharmacies,id',
            'medicine_id' => 'required|exists:medicines,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        // Ownership check for target pharmacy
        $pharmacy = Pharmacy::findOrFail($data['pharmacy_id']);
        if ($pharmacy->user_id !== Auth::id()) {
            abort(403);
        }

        $medicine->update($data);

        return redirect()->route('pharmacy-owner.medicines.index')->with('success', 'Medicine inventory updated.');
    }

    public function destroy(PharmacyMedicine $medicine)
    {
        // Ownership check
        if ($medicine->pharmacy->user_id !== Auth::id()) {
            abort(403);
        }

        $medicine->delete();

        return redirect()->route('pharmacy-owner.medicines.index')->with('success', 'Medicine removed from inventory.');
    }
}
