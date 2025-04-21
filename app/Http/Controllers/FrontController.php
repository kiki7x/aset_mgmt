<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // return view('layouts.front');
        return view('frontsite.index');
    }

    public function lacak()
    {
        return view('frontsite.lacak');
    }
}
