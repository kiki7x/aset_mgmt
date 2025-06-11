<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenancesModel;
use App\Models\AssetsModel;

use Illuminate\Support\Facades\Log;

class ShowAsetRtController extends Controller
{
    public function getOverviewContent($id)
    {
        // Mengambil data aset beserta relasi user.
        // Jika aset tidak ditemukan, akan otomatis melempar 404.
        $asset = \App\Models\AssetsModel::findOrFail($id);
        // Ambil data untuk dropdowns
        $classifications = \App\Models\AssetclassificationsModel::all();
        $categories = \App\Models\AssetcategoriesModel::where('classification_id', 3)->get();
        $users = \App\Models\User::all();
        $manufacturers = \App\Models\ManufacturersModel::all();
        $models = \App\Models\ModelsModel::all();
        $suppliers = \App\Models\SuppliersModel::all();
        $locations = \App\Models\LocationsModel::all();
        $statuses = \App\Models\LabelsModel::all();

        return view('admin.components.overview-aset-rt', compact(
            'id',
            'asset', 
            'classifications',
            'categories',
            'users',
            'manufacturers',
            'models',
            'suppliers',
            'locations',
            'statuses'
        ));
        // ->with([]);
    }

        // Data untuk dropdown
    private $preventiveVehicleOptions = [
        'Ganti Oli Mesin', 'Ganti Oli Transmisi', 'Ganti Filter Udara', 'Kondisi AC',
        'Kondisi Ban', 'Kondisi Rem', 'Kondisi Radiator', 'Kondisi Aki', 'Kondisi Lampu', 'Kondisi Wiper'
    ];

    private $preventiveElectronicOptions = [
        'Pembersihan', 'Pengecekan Kondisi'
    ];

    private $preventiveScheduleOptions = [
        'triwulan' => 'Per 3 Bulan Sekali',
        'caturwulan' => 'Per 4 Bulan Sekali',
        'semester' => 'Per 6 Bulan Sekali'
    ];
    public function getPenjadwalanContent($id)
    {
    /**
     * Menampilkan daftar pemeliharaan.
     */
        // Logika untuk mengambil data Penjadwalan berdasarkan $id
        // Contoh data dummy:
        $jadwals = [
            ['tanggal' => '2025-06-10', 'deskripsi' => 'Servis rutin'],
            ['tanggal' => '2025-07-20', 'deskripsi' => 'Pengecekan ban'],
        ];

        $maintenances = \App\Models\MaintenancesModel::where('asset_id', $id)->get(); // Menggunakan model Maintenance::with('item')->latest()->get();
        $asets = \App\Models\AssetsModel::get(); // Untuk dropdown di form tambah
        Log::info("Loading Penjadwalan for asset ID: $id");
        return view('admin.components.penjadwalan', compact('id', 'maintenances', 'asets'))
               ->with([
                   'preventiveVehicleOptions' => $this->preventiveVehicleOptions,
                   'preventiveElectronicOptions' => $this->preventiveElectronicOptions,
                   'preventiveScheduleOptions' => $this->preventiveScheduleOptions
               ]);
    }

    public function getPenugasanContent($id)
    {
        // Logika untuk mengambil data Penugasan berdasarkan $id
        // Contoh data dummy:
        $penugasans = [
            ['user' => 'Ali', 'start_date' => '2025-05-01', 'end_date' => '2025-05-31'],
            ['user' => 'Budi', 'start_date' => '2025-06-01', 'end_date' => '2025-06-30'],
        ];
        Log::info("Loading Penugasan for asset ID: $id");
        return view('admin.components.penugasan', compact('id', 'penugasans'));
    }

    public function getTicketsContent($id)
    {
        // Logika untuk mengambil data Tickets berdasarkan $id
        // Contoh data dummy:
        $tickets = [
            ['id' => 'TK001', 'subjek' => 'Perbaikan Mesin', 'status' => 'Open'],
            ['id' => 'TK002', 'subjek' => 'Ganti Oli', 'status' => 'Closed'],
        ];
        Log::info("Loading Tickets for asset ID: $id");
        return view('admin.components.tickets', compact('id', 'tickets'));
    }

    public function getFilesContent($id)
    {
        // Logika untuk mengambil data Files berdasarkan $id
        // Contoh data dummy:
        $files = [
            ['name' => 'Manual Book.pdf', 'size' => '2.5 MB', 'uploaded_at' => '2024-01-15'],
            ['name' => 'Invoice Pembelian.jpg', 'size' => '0.8 MB', 'uploaded_at' => '2023-12-01'],
        ];
        Log::info("Loading Files for asset ID: $id");
        return view('admin.components.files', compact('id', 'files'));
    }

    public function getTimeLogContent($id)
    {
        // Logika untuk mengambil data Time Log berdasarkan $id
        // Contoh data dummy:
        $timeLogs = [
            ['date' => '2025-05-10', 'activity' => 'Pengecekan Harian', 'duration' => '1 jam'],
            ['date' => '2025-05-15', 'activity' => 'Penggantian Ban', 'duration' => '2.5 jam'],
        ];
        Log::info("Loading Time Log for asset ID: $id");
        return view('admin.components.timelog', compact('id','timeLogs'));
    }

    public function getEditAssetContent($id)
    {
        // Mengambil data aset beserta relasi user.
        // Jika aset tidak ditemukan, akan otomatis melempar 404.
        $asset = \App\Models\AssetsModel::findOrFail($id);
        // Ambil data untuk dropdowns
        $classifications = \App\Models\AssetclassificationsModel::all();
        $categories = \App\Models\AssetcategoriesModel::whereIn('classification_id', [3, 4])->get();
        $users = \App\Models\User::all();
        $manufacturers = \App\Models\ManufacturersModel::all();
        $models = \App\Models\ModelsModel::all();
        $suppliers = \App\Models\SuppliersModel::all();
        $locations = \App\Models\LocationsModel::all();
        $statuses = \App\Models\LabelsModel::all();

        Log::info("Loading Edit Asset for asset ID: $id");
        return view('admin.components.editasetrt', compact(
            'id',
            'asset', 
            'classifications',
            'categories',
            'users',
            'manufacturers',
            'models',
            'suppliers',
            'locations',
            'statuses'
        ));
    }
    
}
