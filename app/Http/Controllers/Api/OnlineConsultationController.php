<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OnlineConsultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlineConsultationController extends Controller
{
    /**
     * List consultations for the authenticated user (patient or doctor)
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $consultations = OnlineConsultation::with(['doctor', 'patient'])->latest()->paginate(20);
        } elseif ($user->doctors()->exists()) {
            $consultations = OnlineConsultation::with(['patient'])
                ->whereIn('doctor_id', $user->doctors()->pluck('id'))
                ->latest()->paginate(20);
        } else {
            $consultations = OnlineConsultation::with(['doctor'])
                ->where('patient_id', $user->id)
                ->latest()->paginate(20);
        }

        return response()->json($consultations);
    }

    public function show($id)
    {
        $consultation = OnlineConsultation::with(['doctor', 'patient'])->findOrFail($id);

        $user = Auth::user();
        $doctorIds = $user->doctors()->pluck('id')->toArray();

        if (
            $user->role !== 'admin'
            && $consultation->patient_id !== $user->id
            && ! in_array($consultation->doctor_id, $doctorIds)
        ) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        return response()->json($consultation);
    }

    /**
     * Patient books a consultation
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id'        => 'required|exists:doctors,id',
            'scheduled_at'     => 'required|date|after:now',
            'notes'            => 'nullable|string',
        ]);

        $consultation = OnlineConsultation::create([
            'doctor_id'    => $data['doctor_id'],
            'patient_id'   => Auth::id(),
            'scheduled_at' => $data['scheduled_at'],
            'notes'        => $data['notes'] ?? null,
            'status'       => 'pending',
        ]);

        return response()->json($consultation->load(['doctor', 'patient']), 201);
    }

    /**
     * Doctor or admin updates status (approve, reject, complete)
     */
    public function updateStatus(Request $request, $id)
    {
        $consultation = OnlineConsultation::findOrFail($id);

        $data = $request->validate([
            'status' => 'required|in:pending,approved,rejected,completed',
        ]);

        $user      = Auth::user();
        $doctorIds = $user->doctors()->pluck('id')->toArray();

        if ($user->role !== 'admin' && ! in_array($consultation->doctor_id, $doctorIds)) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $consultation->update(['status' => $data['status']]);
        return response()->json($consultation);
    }

    public function destroy($id)
    {
        $consultation = OnlineConsultation::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $consultation->patient_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $consultation->delete();
        return response()->json(['message' => 'Consultation cancelled.']);
    }
}
