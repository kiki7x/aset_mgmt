<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
        
    }

    public function asettik()
    {
        return view('admin.asettik');
        
    }

    public function asetrt()
    {
        return view('admin.asetrt');
        
    }
}