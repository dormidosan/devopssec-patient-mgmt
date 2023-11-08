<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function dashboard()
    {


        return view('doctor.dashboard');
    }


}
