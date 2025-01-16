<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsetrtController extends Controller
{
    // tampilkan semua data asetrt
    public function index()
    {
        //get all assets_tiks from table
        $asetrts = AsetrtModel::latest()->paginate();

        //return collection of assets_tiks as a resource
        return new ApiResource(true, 'List Data Asett RT', $asetrts);
    }
}
