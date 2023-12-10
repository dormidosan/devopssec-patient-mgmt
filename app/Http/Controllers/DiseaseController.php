<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //$diseases = Disease::all();
        $diseases = Disease::take(20)->get();

        return view('diseases.index', compact('diseases'));
    }

}
