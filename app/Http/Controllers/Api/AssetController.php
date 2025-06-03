<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;


// import request
use App\Http\Requests\AssetRequest;

//import model
use App\Models\AssetsModel;
use App\Models\AssetcategoriesModel;
use App\Models\AssetclassificationsModel;

//import api resource
use App\Http\Resources\AssetResource;
use App\Http\Resources\AssetcategoriesResource;
use App\Http\Resources\AssetclassificationsResource;



class AssetController extends Controller
{    
    // tampilkan semua data asettiks
    public function index()
    {
        try {
            //get all assets_tiks from table
            $assets = AssetsModel::latest()->paginate(5);
            return response()->json([
                'status' => 'success',
                'message' => 'List Data Aset TIK',
                'data' => AssetResource::collection($assets),
                'meta' => [
                    'current_page' => $assets->currentPage(),
                    'from' => $assets->firstItem(),
                    'last_page' => $assets->lastPage(),
                    'per_page' => $assets->perPage(),
                    'to' => $assets->lastItem(),
                    'total' => $assets->total(),
                ],
                'links' => [
                    'first' => $assets->url(1),
                    'last' => $assets->url($assets->lastPage()),
                    'prev' => $assets->previousPageUrl(),
                    'next' => $assets->nextPageUrl(),
                ],
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to get data: '. $e->getMessage(),
            ], 500);
        }
    }

    // tampilkan 1 data berdasarkan ID
    public function show($id)
    {
        $asset = AssetsModel::findOrFail($id);
        return new AssetResource(true, 'Detail Data Aset TIK', $asset);
    }

    // tambah data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'classification_id' => 'required|integer',
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
        $asset = AssetsModel::create($validated);
        return new AssetResource(true, 'Data Asettik Berhasil Ditambahkan', $asset);
    }

    // update data
    public function update(Request $request, $id)
    {
        $asset = AssetsModel::findOrFail($id);
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
        $asset->update($validated);
        return new AssetResource(true, 'Data Asettik Berhasil Diupdate', $asset); 
    }

    // hapus data
    public function destroy($id)
    {
        $asset = AssetsModel::findOrFail($id);
        $asset->delete();
        return new AssetResource(true, 'Data Asettik Berhasil Dihapus', null);
    }

}