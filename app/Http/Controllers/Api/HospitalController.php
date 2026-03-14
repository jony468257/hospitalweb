<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{
    public function index(Request $request)
    {
        $query = Hospital::with(['thana.district.division.country', 'doctors']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('thana_id')) {
            $query->where('thana_id', $request->thana_id);
        }

        if ($request->filled('district_id')) {
            $query->whereHas('thana', fn ($q) => $q->where('district_id', $request->district_id));
        }

        return response()->json($query->paginate(15));
    }

    public function show($slug)
    {
        $hospital = Hospital::with(['thana.district.division.country', 'doctors.schedules', 'reviews.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($hospital);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'   => 'required|exists:users,id',
            'name'      => 'required|string|max:255',
            'slug'      => 'required|string|unique:hospitals',
            'thana_id'  => 'required|exists:thanas,id',
            'address'   => 'nullable|string',
            'phone'     => 'nullable|string|max:20',
            'latitude'  => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        return response()->json(Hospital::create($data), 201);
    }

    public function update(Request $request, $id)
    {
        $hospital = Hospital::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $hospital->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $data = $request->validate([
            'name'      => 'sometimes|string|max:255',
            'slug'      => 'sometimes|string|unique:hospitals,slug,' . $id,
            'thana_id'  => 'sometimes|exists:thanas,id',
            'address'   => 'nullable|string',
            'phone'     => 'nullable|string|max:20',
            'latitude'  => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $hospital->update($data);
        return response()->json($hospital);
    }

    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $hospital->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $hospital->delete();
        return response()->json(['message' => 'Hospital deleted successfully.']);
    }

    /**
     * Find nearby hospitals by lat/lng
     * GET /api/hospitals/nearby?lat=23.8&lng=90.4&radius=10
     */
    public function nearby(Request $request)
    {
        $request->validate([
            'lat'    => 'required|numeric',
            'lng'    => 'required|numeric',
            'radius' => 'nullable|numeric|min:1|max:100',
        ]);

        $lat    = $request->lat;
        $lng    = $request->lng;
        $radius = $request->radius ?? 10; // km

        $hospitals = Hospital::with(['thana'])
            ->selectRaw("*, ( 6371 * acos( cos( radians(?) ) * cos( radians(latitude) )
                * cos( radians(longitude) - radians(?) ) + sin( radians(?) )
                * sin( radians(latitude) ) ) ) AS distance", [$lat, $lng, $lat])
            ->whereNotNull('latitude')
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->get();

        return response()->json($hospitals);
    }

    public function addReview(Request $request, $id)
    {
        Hospital::findOrFail($id);

        $data = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = \App\Models\HospitalReview::create([
            'hospital_id' => $id,
            'user_id'     => Auth::id(),
            'rating'      => $data['rating'],
            'comment'     => $data['comment'] ?? null,
        ]);

        return response()->json($review, 201);
    }
}
