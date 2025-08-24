<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']); // Alleen admin toegang
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
