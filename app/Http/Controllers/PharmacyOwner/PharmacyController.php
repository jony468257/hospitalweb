<?php

namespace App\Http\Controllers\PharmacyOwner;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\Thana;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Auth::user()->pharmacies()->with('thana')->paginate(10);
        return view('pharmacy-owner.pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        $thanas = Thana::all();
        $countries = Country::all();
        return view('pharmacy-owner.pharmacies.create', compact('thanas', 'countries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'thana_id' => 'required|exists:thanas,id',
            'country_id' => 'required|exists:countries,id',
            'phone' => 'nullable|string|max:20',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'license_no' => 'nullable|string|max:100',
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']) . '-' . rand(1000, 9999);

        Pharmacy::create($data);

        return redirect()->route('pharmacy-owner.pharmacies.index')->with('success', 'Pharmacy created successfully.');
    }

    public function edit(Pharmacy $pharmacy)
    {
        if ($pharmacy->user_id !== Auth::id()) {
            abort(403);
        }

        $thanas = Thana::all();
        $countries = Country::all();
        return view('pharmacy-owner.pharmacies.edit', compact('pharmacy', 'thanas', 'countries'));
    }

    public function update(Request $request, Pharmacy $pharmacy)
    {
        if ($pharmacy->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'thana_id' => 'required|exists:thanas,id',
            'country_id' => 'required|exists:countries,id',
            'phone' => 'nullable|string|max:20',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'license_no' => 'nullable|string|max:100',
        ]);

        $pharmacy->update($data);

        return redirect()->route('pharmacy-owner.pharmacies.index')->with('success', 'Pharmacy updated successfully.');
    }

    public function destroy(Pharmacy $pharmacy)
    {
        if ($pharmacy->user_id !== Auth::id()) {
            abort(403);
        }

        $pharmacy->delete();

        return redirect()->route('pharmacy-owner.pharmacies.index')->with('success', 'Pharmacy deleted successfully.');
    }
}
