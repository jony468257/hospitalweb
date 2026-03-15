<?php

namespace App\Http\Controllers\HospitalOwner;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Thana;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Auth::user()->hospitals()->with('thana')->paginate(10);
        return view('hospital-owner.hospitals.index', compact('hospitals'));
    }

    public function create()
    {
        $thanas = Thana::all();
        $countries = Country::all();
        return view('hospital-owner.hospitals.create', compact('thanas', 'countries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'thana_id' => 'required|exists:thanas,id',
            'country_id' => 'required|exists:countries,id',
            'phone' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']) . '-' . rand(1000, 9999);

        Hospital::create($data);

        return redirect()->route('hospital-owner.hospitals.index')->with('success', 'Hospital created successfully.');
    }

    public function edit(Hospital $hospital)
    {
        if ($hospital->user_id !== Auth::id()) {
            abort(403);
        }

        $thanas = Thana::all();
        $countries = Country::all();
        return view('hospital-owner.hospitals.edit', compact('hospital', 'thanas', 'countries'));
    }

    public function update(Request $request, Hospital $hospital)
    {
        if ($hospital->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'thana_id' => 'required|exists:thanas,id',
            'country_id' => 'required|exists:countries,id',
            'phone' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $hospital->update($data);

        return redirect()->route('hospital-owner.hospitals.index')->with('success', 'Hospital updated successfully.');
    }

    public function destroy(Hospital $hospital)
    {
        if ($hospital->user_id !== Auth::id()) {
            abort(403);
        }

        $hospital->delete();

        return redirect()->route('hospital-owner.hospitals.index')->with('success', 'Hospital deleted successfully.');
    }
}
