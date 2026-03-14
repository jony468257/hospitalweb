<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PharmacyController extends Controller
{
    public function index(Request $request)
    {
        $query = Pharmacy::with(['thana.district.division']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('thana_id')) {
            $query->where('thana_id', $request->thana_id);
        }

        return response()->json($query->paginate(15));
    }

    public function show($slug)
    {
        $pharmacy = Pharmacy::with(['thana.district.division.country', 'medicines'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($pharmacy);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'   => 'required|exists:users,id',
            'name'      => 'required|string|max:255',
            'slug'      => 'required|string|unique:pharmacies',
            'thana_id'  => 'required|exists:thanas,id',
            'address'   => 'nullable|string',
            'phone'     => 'nullable|string|max:20',
            'latitude'  => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        return response()->json(Pharmacy::create($data), 201);
    }

    public function update(Request $request, $id)
    {
        $pharmacy = Pharmacy::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $pharmacy->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $data = $request->validate([
            'name'      => 'sometimes|string|max:255',
            'slug'      => 'sometimes|string|unique:pharmacies,slug,' . $id,
            'thana_id'  => 'sometimes|exists:thanas,id',
            'address'   => 'nullable|string',
            'phone'     => 'nullable|string|max:20',
            'latitude'  => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $pharmacy->update($data);
        return response()->json($pharmacy);
    }

    public function destroy($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $pharmacy->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $pharmacy->delete();
        return response()->json(['message' => 'Pharmacy deleted successfully.']);
    }

    /**
     * Find nearby pharmacies by lat/lng
     * GET /api/pharmacies/nearby?lat=23.8&lng=90.4&radius=5
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
        $radius = $request->radius ?? 5;

        $pharmacies = Pharmacy::with(['thana'])
            ->selectRaw("*, ( 6371 * acos( cos( radians(?) ) * cos( radians(latitude) )
                * cos( radians(longitude) - radians(?) ) + sin( radians(?) )
                * sin( radians(latitude) ) ) ) AS distance", [$lat, $lng, $lat])
            ->whereNotNull('latitude')
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->get();

        return response()->json($pharmacies);
    }

    /**
     * Manage medicine inventory for a pharmacy
     * PUT /api/pharmacies/{id}/medicines
     */
    public function syncMedicines(Request $request, $id)
    {
        $pharmacy = Pharmacy::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $pharmacy->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $request->validate([
            'medicines'            => 'required|array',
            'medicines.*.id'       => 'required|exists:medicines,id',
            'medicines.*.stock'    => 'required|integer|min:0',
            'medicines.*.price'    => 'required|numeric|min:0',
            'medicines.*.discount' => 'nullable|numeric|min:0|max:100',
        ]);

        $syncData = collect($request->medicines)->mapWithKeys(fn ($m) => [
            $m['id'] => [
                'stock'    => $m['stock'],
                'price'    => $m['price'],
                'discount' => $m['discount'] ?? 0,
            ]
        ])->toArray();

        $pharmacy->medicines()->sync($syncData);

        return response()->json(['message' => 'Inventory updated.', 'inventory' => $pharmacy->medicines()->get()]);
    }
}
