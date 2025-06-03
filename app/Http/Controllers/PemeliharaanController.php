<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PemeliharaanController extends Controller
{
    // Data untuk dropdown
    private $opsiPreventifKendaraan = [
        'Pajak STNK', 'Tune Up', 'Pelumasan', 'Inspeksi Radiator', 'Inspeksi Mesin', 'Inspeksi AC', 'Inspeksi Ban'
    ];

    private $opsiPreventifElektronik = [
        'Pembersihan', 'Pengecekan Kondisi'
    ];

    private $skejulOpsiPreventif = [
        'per_3_bulan' => 'Per 3 Bulan Sekali',
        'per_4_bulan' => 'Per 4 Bulan Sekali',
        'per_6_bulan' => 'Per 6 Bulan Sekali',
        'per_12_bulan' => 'Per 12 Bulan Sekali'
    ];

    public function index($id)
    {
        $maintenances = \App\Models\MaintenancesModel::where('asset_id', $id)->get(); // Menggunakan model Maintenance::with('item')->latest()->get();
        $asets = \App\Models\AssetsModel::get(); // Untuk dropdown di form tambah
        Log::info("Loading Penjadwalan for asset ID: $id");
        return view('admin.components.pemeliharaan', compact('id', 'maintenances', 'asets'))
        ->with([
                   'opsiPreventifKendaraan' => $this->opsiPreventifKendaraan,
                   'opsiPreventifElektronik' => $this->opsiPreventifElektronik,
                   'skejulOpsiPreventif' => $this->skejulOpsiPreventif
               ]);
    }

    public function getFormData()
    {
        
    }

    public function store(Request $request, $id)
    {
        $maintenance = new \App\Models\MaintenancesModel($request->all());
        $maintenance->asset_id = $id;
        $maintenance->save();
        return redirect()->route('admin.pemeliharaan.index', $id);
    }
}