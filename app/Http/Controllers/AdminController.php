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
    public function asettik_create()
    {
        return view('admin.asettik_create');
        
    }
    public function asettik_show($id)
    {
        return view('admin.asettik_show');
        
    }

    public function asettik_edit(Asettik $asettik)
    {
        return view('admin.asettik_edit', compact('asettik'));  // Mengarahkan ke form edit
    }



    public function asetrt()
    {
        return view('admin.asetrt');
        
    }
}