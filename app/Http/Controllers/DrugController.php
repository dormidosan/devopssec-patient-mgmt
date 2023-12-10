<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //$drugs = Drug::all();
        $drugs = Drug::take(20)->get();

        return view('drugs.index', compact('drugs'));
    }

}
