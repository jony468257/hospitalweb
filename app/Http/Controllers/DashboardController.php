<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Pharmacy;
use App\Models\Disease;
use App\Models\Medicine;
use App\Models\OnlineConsultation;
use App\Models\DoctorReview;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $path = request()->path();

        // Redirection logic for generic dashboard/home routes
        if ($path === 'dashboard' || $path === 'home') {
            return match($user->role) {
                'admin'           => redirect()->route('admin.dashboard'),
                'hospital_owner'  => redirect()->route('hospital-owner.dashboard'),
                'doctor'          => redirect()->route('doctor.dashboard'),
                'pharmacy_owner'  => redirect()->route('pharmacy-owner.dashboard'),
                'patient'         => redirect()->route('patient.dashboard'),
                default           => redirect()->route('patient.dashboard'),
            };
        }

        // Admin Dashboard Stats
        if ($user->role === 'admin') {
            $stats = [
                'total_users'         => User::count(),
                'total_doctors'       => Doctor::count(),
                'total_hospitals'     => Hospital::count(),
                'total_pharmacies'    => Pharmacy::count(),
                'total_diseases'      => Disease::count(),
                'total_medicines'     => Medicine::count(),
                'pending_consultations' => OnlineConsultation::where('status', 'pending')->count(),
                'recent_consultations'  => OnlineConsultation::with(['doctor', 'patient'])
                                             ->latest()->take(5)->get(),
                'recent_doctors'      => Doctor::with('hospitals')->latest()->take(5)->get(),
                'recent_hospitals'    => Hospital::with('thana')->latest()->take(5)->get(),
            ];
            return view('dashboard.admin', compact('user', 'stats'));
        }

        // Doctor Dashboard
        if ($user->role === 'doctor') {
            $doctor     = $user->doctors()->first();
            $doctorIds  = $user->doctors()->pluck('id');
            $stats = [
                'my_hospitals'      => $doctor ? $doctor->hospitals()->count() : 0,
                'total_schedules'   => $doctor ? $doctor->schedules()->count() : 0,
                'pending_consults'  => OnlineConsultation::whereIn('doctor_id', $doctorIds)->where('status', 'pending')->count(),
                'done_consults'     => OnlineConsultation::whereIn('doctor_id', $doctorIds)->where('status', 'completed')->count(),
                'avg_rating'        => DoctorReview::whereIn('doctor_id', $doctorIds)->avg('rating'),
                'recent_consults'   => OnlineConsultation::whereIn('doctor_id', $doctorIds)->with('patient')->latest()->take(5)->get(),
            ];
            return view('dashboard.doctor', compact('user', 'doctor', 'stats'));
        }

        // Hospital Owner Dashboard
        if ($user->role === 'hospital_owner') {
            $stats = [
                'my_hospitals'   => $user->hospitals()->count(),
                'total_doctors'  => $user->hospitals()->withCount('doctors')->get()->sum('doctors_count'),
                'recent_hospitals' => $user->hospitals()->with('thana')->latest()->take(5)->get(),
            ];
            return view('dashboard.hospital', compact('user', 'stats'));
        }

        // Pharmacy Owner Dashboard
        if ($user->role === 'pharmacy_owner') {
            $stats = [
                'my_pharmacies'      => $user->pharmacies()->count(),
                'total_medicines'    => $user->pharmacies()->withCount('medicines')->get()->sum('medicines_count'),
                'recent_pharmacies'  => $user->pharmacies()->with('thana')->latest()->take(5)->get(),
            ];
            return view('dashboard.pharmacy', compact('user', 'stats'));
        }

        // Patient / General User Dashboard
        $stats = [
            'my_consultations'  => OnlineConsultation::where('patient_id', $user->id)->count(),
            'pending_consults'  => OnlineConsultation::where('patient_id', $user->id)->where('status', 'pending')->count(),
            'bookmarks'         => $user->bookmarks()->count() ?? 0,
            'recent_consults'   => OnlineConsultation::where('patient_id', $user->id)->with('doctor')->latest()->take(5)->get(),
        ];
        return view('dashboard.patient', compact('user', 'stats'));
    }
}
