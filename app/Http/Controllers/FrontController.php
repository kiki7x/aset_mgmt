<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function testing()
    {
        return view('frontsite.testing');
    }

    public function index()
    {
        $assets = \App\Models\AssetsModel::get();
        return view('frontsite.index', compact('assets'));
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
