<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SetatributController extends Controller
{
    public function index()
    {
        $klasifikasi = \App\Models\AssetclassificationsModel::get();
        $kategori = \App\Models\AssetcategoriesModel::get();
        $merk = \App\Models\ManufacturersModel::get();
        $model = \App\Models\ModelsModel::get();
        $supplier = \App\Models\SuppliersModel::get();
        $label = \App\Models\LabelsModel::get();
        // $kategorilisensi = \App\Models\LicensecategoriesModel::get();
        $lokasi = \App\Models\LocationsModel::get();
        return view('admin.setatribut', ['title' => 'Setting Atribut Aset'], 
        compact('klasifikasi', 'kategori', 'merk', 'model', 'supplier', 'label', 'lokasi')
        );    
    }

    public function klasifikasi()
    {
        $klasifikasis = \App\Models\AssetclassificationsModel::get();
        return view('admin.setklasifikasi', ['title' => 'Setting Klasifikasi'],
        compact('klasifikasis')
        );
    }

    public function kategori()
    {
        $kategoris = \App\Models\AssetcategoriesModel::get();
        return view('admin.setkategori', ['title' => 'Setting Kategori'],
        compact('kategoris')
        );
        
    }

    public function merk()
    {
        $merks = \App\Models\ManufacturersModel::get();
        return view('admin.setmerk', ['title' => 'Setting Merk'],
        compact('merks')
        );
    }

    public function tipe()
    {
        return view('admin.settipe', ['title' => 'Setting Merk']);
    }

    public function supplier()
    {
        return view('admin.setsupplier', ['title' => 'Setting Supplier']);
    }

    public function label()
    {
        return view('admin.setlabel', ['title' => 'Setting Label']);
    }

    public function kategorilisensi()
    {
        return view('admin.setkategorilisensi', ['title' => 'Setting Kategori Lisensi']);
    }

    public function lokasi()
    {
        return view('admin.setlokasi', ['title' => 'Setting Lokasi']);
    }
}