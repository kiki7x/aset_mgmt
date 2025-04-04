<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{
    public function index()
    {
        $klasifikasis = \App\Models\AssetclassificationsModel::paginate(1);

        return view('admin.setklasifikasi', [
            'title' => 'Setting Klasifikasi',
            'klasifikasis' => $klasifikasis,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        \App\Models\AssetclassificationsModel::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Klasifikasi berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $klasifikasi = \App\Models\AssetclassificationsModel::findOrFail($id);
        $klasifikasi->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Klasifikasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $klasifikasi = \App\Models\AssetclassificationsModel::findOrFail($id);
        $klasifikasi->delete();

        return redirect()->back()->with('success', 'Klasifikasi berhasil dihapus');
    }
    
    public function show($id)
    {
        $klasifikasi = \App\Models\AssetclassificationsModel::findOrFail($id);
        return view('admin.showklasifikasi', [
            'title' => 'Detail Klasifikasi',
            'klasifikasi' => $klasifikasi,
        ]);
    }
}
