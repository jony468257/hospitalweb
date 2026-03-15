<?php

namespace App\Http\Controllers\HospitalOwner;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function index()
    {
        $hospitalIds = Auth::user()->hospitals()->pluck('id');
        $doctors = Doctor::whereHas('hospitals', function($q) use ($hospitalIds) {
            $q->whereIn('hospitals.id', $hospitalIds);
        })->paginate(15);

        return view('hospital-owner.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $hospitals = Auth::user()->hospitals;
        return view('hospital-owner.doctors.create', compact('hospitals'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hospital_id' => 'required|exists:hospitals,id',
            'name' => 'required|string|max:255',
            'specialization' => 'required|string',
            'degree' => 'nullable|string',
            'experience_year' => 'nullable|integer',
            'bio' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
        ]);

        $hospital = Hospital::findOrFail($data['hospital_id']);
        if ($hospital->user_id !== Auth::id()) {
            abort(403);
        }

        $doctor = Doctor::create([
            'name' => $data['name'],
            'specialization' => $data['specialization'],
            'degree' => $data['degree'],
            'experience_year' => $data['experience_year'],
            'bio' => $data['bio'],
            'slug' => Str::slug($data['name']) . '-' . rand(1000, 9999),
        ]);

        $doctor->hospitals()->attach($hospital->id);

        return redirect()->route('hospital-owner.doctors.index')->with('success', 'Doctor added to hospital.');
    }

    public function edit(Doctor $doctor)
    {
        // Ownership check
        $hospitalIds = Auth::user()->hospitals()->pluck('id')->toArray();
        if (!$doctor->hospitals()->whereIn('hospitals.id', $hospitalIds)->exists()) {
            abort(403);
        }

        $hospitals = Auth::user()->hospitals;
        return view('hospital-owner.doctors.edit', compact('doctor', 'hospitals'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        // Ownership check
        $hospitalIds = Auth::user()->hospitals()->pluck('id')->toArray();
        if (!$doctor->hospitals()->whereIn('hospitals.id', $hospitalIds)->exists()) {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string',
            'degree' => 'nullable|string',
            'experience_year' => 'nullable|integer',
            'bio' => 'nullable|string',
        ]);

        $doctor->update($data);

        return redirect()->route('hospital-owner.doctors.index')->with('success', 'Doctor updated.');
    }
}
