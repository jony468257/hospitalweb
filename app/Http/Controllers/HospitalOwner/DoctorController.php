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
            'password' => 'required|min:8',
        ]);

        $hospital = Hospital::findOrFail($data['hospital_id']);
        if ($hospital->user_id !== Auth::id()) {
            abort(403);
        }

        // Create the User first
        $user = \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'doctor',
        ]);

        // Create the Doctor Profile
        $doctor = Doctor::create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'specialization' => $data['specialization'],
            'degree' => $data['degree'],
            'experience_year' => $data['experience_year'],
            'bio' => $data['bio'],
            'slug' => Str::slug($data['name']) . '-' . rand(1000, 9999),
        ]);

        $doctor->hospitals()->attach($hospital->id);

        return redirect()->route('hospital-owner.doctors.index')->with('success', 'Doctor created and added to hospital successfully.');
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

    public function destroy(Doctor $doctor)
    {
        // Ownership check
        $hospitalIds = Auth::user()->hospitals()->pluck('id')->toArray();
        if (!$doctor->hospitals()->whereIn('hospitals.id', $hospitalIds)->exists()) {
            abort(403);
        }

        // Optional: Detach from all of owner's hospitals
        // Or completely delete the doctor and user
        $doctor->hospitals()->detach($hospitalIds);
        
        // If the doctor belongs to no other hospitals, you might choose to delete their User profile too.
        if ($doctor->hospitals()->count() === 0) {
            $userId = $doctor->user_id;
            $doctor->delete();
            \App\Models\User::where('id', $userId)->delete();
        }

        return redirect()->route('hospital-owner.doctors.index')->with('success', 'Doctor removed successfully.');
    }
}
