<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function AdminDashboard(): View
    {
        return view('admin.dashboard');
    }
}
