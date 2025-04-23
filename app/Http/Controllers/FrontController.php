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

    public function lacak_show($id)
    {
        $lacak = \App\Models\AssetsModel::where('tag', $id)->firstOrFail();
        return view('frontsite.lacak_show', compact('lacak'));
    }
}
