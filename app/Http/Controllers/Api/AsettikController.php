<?php

namespace App\Http\Controllers\Api;

//import model AsettikModel
use App\Models\AsettikModel;
use App\Http\Controllers\Controller;
//import resource ApiResource
use App\Http\Resources\ApiResource;

class AsettikController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    // tampilkan semua data asettiks
    public function index()
    {
        //get all assets_tiks from table
        $asettiks = AsettikModel::latest()->paginate();

        //return collection of assets_tiks as a resource
        return new ApiResource(true, 'List Data Asettik', $asettiks);
    }

    // tampilkan 1 data berdasarkan ID
    public function show($id)
    {
        $asettiks = AsettikModel::findOrFail($id);
        return new ApiResource(true, 'Detail Data Asettik', $asettiks);
    }

    // tambah data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'admin_id' => 'required|integer',
            'client_id' => 'required|integer',
            'user_id' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'model_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'status_id' => 'required|integer',
            'purchase_date' => 'required|date',
            'warranty_months' => 'required|integer',
            'tag' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'serial' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'location_id' => 'required|integer',
            'customfields' => 'nullable|string',
            'qrvalue' => 'nullable|string',
        ]);
        $asettiks = AsettikModel::create($validated);
        return new AsettikResource(true, 'Data Asettik Berhasil Ditambahkan', $asettiks);
    }

    // update data
    public function update(Request $request, $id)
    {
        $asettiks = AsettikModel::findOrFail($id);
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'admin_id' => 'required|integer',
            'client_id' => 'required|integer',
            'user_id' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'model_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'status_id' => 'required|integer',
            'purchase_date' => 'required|date',
            'warranty_months' => 'required|integer',
            'tag' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'serial' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'location_id' => 'required|integer',
            'customfields' => 'nullable|string',
            'qrvalue' => 'nullable|string',
        ]);
        $asettiks->update($validated);
        return new AsettikResource(true, 'Data Asettik Berhasil Diupdate', $asettiks); 
    }

    // hapus data
    public function destroy($id)
    {
        $asettiks = AsettikModel::findOrFail($id);
        $asettiks->delete();
        return new AsettikResource(true, 'Data Asettik Berhasil Dihapus', null);
    }

}