<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $doctor = $user->doctors()->first();
        if (!$doctor) {
            return redirect()->back()->with('error', 'You are not registered as a doctor.');
        }

        $schedules = $doctor->schedules()->with('hospital')->paginate(10);
        return view('doctor.schedules.index', compact('schedules'));
    }

    public function create()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $doctor = $user->doctors()->first();
        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $hospitals = $doctor->hospitals;
        return view('doctor.schedules.create', compact('hospitals'));
    }

    public function store(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $doctor = $user->doctors()->first();
        if (!$doctor) {
            abort(403);
        }

        $data = $request->validate([
            'hospital_id' => 'required|exists:hospitals,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'visit_fee' => 'required|numeric|min:0',
        ]);

        $data['doctor_id'] = $doctor->id;

        DoctorSchedule::create($data);

        return redirect()->route('doctor.schedules.index')->with('success', 'Schedule added successfully.');
    }

    public function edit(DoctorSchedule $schedule)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $doctor = $user->doctors()->first();
        if (!$doctor || $schedule->doctor_id !== $doctor->id) {
            abort(403);
        }

        $hospitals = $doctor->hospitals;
        return view('doctor.schedules.edit', compact('schedule', 'hospitals'));
    }

    public function update(Request $request, DoctorSchedule $schedule)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $doctor = $user->doctors()->first();
        if (!$doctor || $schedule->doctor_id !== $doctor->id) {
            abort(403);
        }

        $data = $request->validate([
            'hospital_id' => 'required|exists:hospitals,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'visit_fee' => 'required|numeric|min:0',
        ]);

        $schedule->update($data);

        return redirect()->route('doctor.schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(DoctorSchedule $schedule)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $doctor = $user->doctors()->first();
        if (!$doctor || $schedule->doctor_id !== $doctor->id) {
            abort(403);
        }

        $schedule->delete();

        return redirect()->route('doctor.schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
