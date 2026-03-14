<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $query = Doctor::with(['hospitals.thana', 'schedules', 'reviews']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('specialization', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('specialization')) {
            $query->where('specialization', $request->specialization);
        }

        if ($request->filled('thana_id')) {
            $query->whereHas('hospitals', fn ($q) => $q->where('thana_id', $request->thana_id));
        }

        return response()->json($query->paginate(15));
    }

    public function show($slug)
    {
        $doctor = Doctor::with(['user', 'hospitals.thana', 'schedules', 'reviews.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($doctor);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'         => 'required|exists:users,id',
            'name'            => 'required|string|max:255',
            'slug'            => 'required|string|unique:doctors',
            'specialization'  => 'required|string|max:255',
            'degree'          => 'nullable|string|max:255',
            'experience_year' => 'nullable|integer|min:0',
            'bio'             => 'nullable|string',
        ]);

        $doctor = Doctor::create($data);
        return response()->json($doctor, 201);
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        // Multi-tenant: doctor owner or admin only
        if (Auth::user()->role !== 'admin' && $doctor->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $data = $request->validate([
            'name'            => 'sometimes|string|max:255',
            'slug'            => 'sometimes|string|unique:doctors,slug,' . $id,
            'specialization'  => 'sometimes|string|max:255',
            'degree'          => 'nullable|string|max:255',
            'experience_year' => 'nullable|integer|min:0',
            'bio'             => 'nullable|string',
        ]);

        $doctor->update($data);
        return response()->json($doctor);
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $doctor->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $doctor->delete();
        return response()->json(['message' => 'Doctor deleted successfully.']);
    }

    /**
     * Add review for a doctor
     * POST /api/doctors/{id}/reviews
     */
    public function addReview(Request $request, $id)
    {
        Doctor::findOrFail($id);

        $data = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = \App\Models\DoctorReview::create([
            'doctor_id' => $id,
            'user_id'   => Auth::id(),
            'rating'    => $data['rating'],
            'comment'   => $data['comment'] ?? null,
        ]);

        return response()->json($review, 201);
    }
}
