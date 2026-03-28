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
        $doctors = \App\Models\Doctor::all();
        return view('hospital-owner.hospitals.create', compact('thanas', 'countries', 'doctors'));
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
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'services' => 'nullable|array',
            'services.*.name' => 'required_with:services.*.price|string',
            'services.*.price' => 'required_with:services.*.name|numeric',
            'doctors' => 'nullable|array',
            'doctors.*' => 'exists:doctors,id'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']) . '-' . rand(1000, 9999);

        // Extract relations data
        $features = $data['features'] ?? [];
        $services = $data['services'] ?? [];
        $doctors = $data['doctors'] ?? [];
        
        // Exclude relations from direct hospital creation
        unset($data['features'], $data['services'], $data['doctors']);

        $hospital = Hospital::create($data);

        // Save Features
        foreach ($features as $featureName) {
            if (!empty($featureName)) {
                $hospital->features()->create(['name' => $featureName]);
            }
        }

        // Save Services
        foreach ($services as $service) {
            if (!empty($service['name']) && isset($service['price'])) {
                $hospital->services()->create([
                    'name' => $service['name'],
                    'price' => $service['price']
                ]);
            }
        }

        // Sync Doctors
        if (!empty($doctors)) {
            $hospital->doctors()->sync($doctors);
        }

        return redirect()->route('hospital-owner.hospitals.index')->with('success', 'Hospital created successfully.');
    }

    public function edit(Hospital $hospital)
    {
        if ($hospital->user_id !== Auth::id()) {
            abort(403);
        }

        $thanas = Thana::all();
        $countries = Country::all();
        $doctors = \App\Models\Doctor::all();
        return view('hospital-owner.hospitals.edit', compact('hospital', 'thanas', 'countries', 'doctors'));
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
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'services' => 'nullable|array',
            'services.*.name' => 'required_with:services.*.price|string',
            'services.*.price' => 'required_with:services.*.name|numeric',
            'doctors' => 'nullable|array',
            'doctors.*' => 'exists:doctors,id'
        ]);

        // Extract relations data
        $features = $data['features'] ?? [];
        $services = $data['services'] ?? [];
        $doctors = $data['doctors'] ?? [];
        
        // Exclude relations from direct hospital update
        unset($data['features'], $data['services'], $data['doctors']);

        $hospital->update($data);

        // Re-create Features (delete old ones to prevent duplicates/missing deletions)
        $hospital->features()->delete();
        foreach ($features as $featureName) {
            if (!empty($featureName)) {
                $hospital->features()->create(['name' => $featureName]);
            }
        }

        // Re-create Services
        $hospital->services()->delete();
        foreach ($services as $service) {
            if (!empty($service['name']) && isset($service['price'])) {
                $hospital->services()->create([
                    'name' => $service['name'],
                    'price' => $service['price']
                ]);
            }
        }

        // Sync Doctors
        $hospital->doctors()->sync($doctors);

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
