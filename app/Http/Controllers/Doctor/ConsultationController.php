<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\OnlineConsultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $doctorIds = $user->doctors()->pluck('id');

        $consultations = OnlineConsultation::whereIn('doctor_id', $doctorIds)
            ->with(['patient', 'hospital'])
            ->latest()
            ->paginate(15);

        return view('doctor.consultations.index', compact('consultations'));
    }

    public function show(OnlineConsultation $consultation)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if (!$user->doctors()->where('id', $consultation->doctor_id)->exists()) {
            abort(403);
        }

        $consultation->load(['patient', 'hospital']);
        return view('doctor.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, OnlineConsultation $consultation)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if (!$user->doctors()->where('id', $consultation->doctor_id)->exists()) {
            abort(403);
        }

        $data = $request->validate([
            'status' => 'required|in:pending,accepted,completed,cancelled',
            'meeting_link' => 'nullable|url',
        ]);

        $consultation->update($data);

        return redirect()->back()->with('success', 'Consultation status updated.');
    }
}
