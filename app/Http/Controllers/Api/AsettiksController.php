<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;


// import request
use App\Http\Requests\AsettiksRequest;

//import model
use App\Models\AsettiksModel;
use App\Models\AssetcategoriesModel;
use App\Models\AssetclassificationsModel;

//import api resource
use App\Http\Resources\AsettiksResource;
use App\Http\Resources\AssetcategoriesResource;
use App\Http\Resources\AssetclassificationsResource;



class AsettiksController extends Controller
{    
    // tampilkan semua data asettiks
    public function index()
    {
        try {
            //get all assets_tiks from table
            $asettiks = AsettiksModel::latest()->paginate(5);
            return response()->json([
                'status' => 'success',
                'message' => 'List Data Aset TIK',
                'data' => AsettiksResource::collection($asettiks),
                'meta' => [
                    'current_page' => $asettiks->currentPage(),
                    'from' => $asettiks->firstItem(),
                    'last_page' => $asettiks->lastPage(),
                    'per_page' => $asettiks->perPage(),
                    'to' => $asettiks->lastItem(),
                    'total' => $asettiks->total(),
                ],
                'links' => [
                    'first' => $asettiks->url(1),
                    'last' => $asettiks->url($asettiks->lastPage()),
                    'prev' => $asettiks->previousPageUrl(),
                    'next' => $asettiks->nextPageUrl(),
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
        $asettiks = AsettikModel::findOrFail($id);
        return new ApiResource(true, 'Detail Data Aset TIK', $asettiks);
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