<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorScheduleController extends Controller
{
    public function index($doctorId)
    {
        return response()->json(DoctorSchedule::where('doctor_id', $doctorId)->orderBy('day_of_week')->get());
    }

    public function store(Request $request, $doctorId)
    {
        $data = $request->validate([
            'hospital_id' => 'nullable|exists:hospitals,id',
            'day_of_week' => 'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i|after:start_time',
            'visit_fee'   => 'nullable|numeric|min:0',
            'max_patients'=> 'nullable|integer|min:1',
        ]);

        $data['doctor_id'] = $doctorId;
        $schedule = DoctorSchedule::create($data);

        return response()->json($schedule, 201);
    }

    public function update(Request $request, $doctorId, $id)
    {
        $schedule = DoctorSchedule::where('doctor_id', $doctorId)->findOrFail($id);

        $data = $request->validate([
            'hospital_id' => 'nullable|exists:hospitals,id',
            'day_of_week' => 'sometimes|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
            'start_time'  => 'sometimes|date_format:H:i',
            'end_time'    => 'sometimes|date_format:H:i',
            'visit_fee'   => 'nullable|numeric|min:0',
            'max_patients'=> 'nullable|integer|min:1',
        ]);

        $schedule->update($data);
        return response()->json($schedule);
    }

    public function destroy($doctorId, $id)
    {
        DoctorSchedule::where('doctor_id', $doctorId)->findOrFail($id)->delete();
        return response()->json(['message' => 'Schedule removed.']);
    }
}
