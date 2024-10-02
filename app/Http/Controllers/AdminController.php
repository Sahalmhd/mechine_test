<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        // Logic for displaying the admin dashboard
        return view('admin.dashboard'); // Ensure you have a view file at resources/views/admin/dashboard.blade.php
    }
}
