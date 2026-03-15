<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\OnlineConsultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = OnlineConsultation::where('patient_id', Auth::id())
            ->with(['doctor', 'hospital'])
            ->latest()
            ->paginate(15);

        return view('patient.consultations.index', compact('consultations'));
    }

    public function create(Request $request)
    {
        $doctorId = $request->doctor_id;
        $hospitalId = $request->hospital_id;

        $doctor = $doctorId ? Doctor::findOrFail($doctorId) : null;
        $hospital = $hospitalId ? Hospital::findOrFail($hospitalId) : null;

        $hospitals = Hospital::all();
        $doctors = Doctor::all();

        return view('patient.consultations.create', compact('doctor', 'hospital', 'hospitals', 'doctors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'consult_date' => 'required|date|after_or_equal:today',
            'message' => 'nullable|string',
        ]);

        $data['patient_id'] = Auth::id();
        $data['status'] = 'pending';

        OnlineConsultation::create($data);

        return redirect()->route('patient.consultations.index')->with('success', 'Consultation booked successfully. Please wait for doctor approval.');
    }

    public function show(OnlineConsultation $consultation)
    {
        if ($consultation->patient_id !== Auth::id()) {
            abort(403);
        }

        $consultation->load(['doctor', 'hospital']);
        return view('patient.consultations.show', compact('consultation'));
    }

    public function destroy(OnlineConsultation $consultation)
    {
        if ($consultation->patient_id !== Auth::id()) {
            abort(403);
        }

        if ($consultation->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending consultations can be cancelled.');
        }

        $consultation->delete();

        return redirect()->route('patient.consultations.index')->with('success', 'Consultation cancelled.');
    }
}
