<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-users');
    }

    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }
}
