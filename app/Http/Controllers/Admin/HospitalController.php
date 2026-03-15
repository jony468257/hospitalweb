<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::with('owner')->paginate(20);
        return view('admin.hospitals.index', compact('hospitals'));
    }

    public function toggleStatus(Hospital $hospital)
    {
        $hospital->update(['status' => $hospital->status === 'active' ? 'inactive' : 'active']);
        return redirect()->back()->with('success', 'Hospital status updated.');
    }
}
