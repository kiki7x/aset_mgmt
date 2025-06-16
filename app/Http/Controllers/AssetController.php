<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetRequest;
use App\Models\AssetcategoriesModel;
use App\Models\AssetsModel;
use App\Models\LabelsModel;
use App\Models\LocationsModel;
use App\Models\ManufacturersModel;
use App\Models\ModelsModel;
use App\Models\SuppliersModel;
use App\Models\User;
use App\Notifications\CreateAsetRT;
use App\Notifications\CreateAsetTik;
use App\Notifications\DeleteAsetTik;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public $prefix_tik = "tik";
    public $prefix_rt = "rt";
    public $classification_tik_id = "2";
    public $classification_rt_id = "3";
    public $client_id = 1;

    public function index_tik()
    {
        $manufacturers = ManufacturersModel::get();
        $models = ModelsModel::get();
        $suppliers = SuppliersModel::get();
        $locations = LocationsModel::get();
        $statuses = LabelsModel::get();
        $users = User::get();

        $categories = AssetcategoriesModel::whereIn('classification_id', [2])->get();

        $assets = AssetsModel::with('category', 'status', 'model', 'user')->where('classification_id', 2)->latest()->paginate(10);

        $totalAssets = AssetsModel::where('classification_id', 2)->count();

        return view('admin.asettik.index', compact('assets', 'totalAssets', 'categories', 'manufacturers', 'models', 'suppliers', 'locations', 'statuses', 'users'));
    }

    public function search_tik(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $assets = AssetsModel::with('category', 'status', 'model', 'user')
            ->where('classification_id', 2)
            ->when($category, fn($query) => $query->where('category_id', $category))
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery->where('name', 'like', "%$search%")
                        ->orWhere('serial', 'like', "%$search%");
                });
            })
            ->latest()
            ->paginate($request->per_page ?? 10);

        $output = '';
        foreach ($assets as $asset) {
            $output .= '
        <tr>
            <td><a href="' . route('admin.asettik.show', $asset->id) . '">' . $asset->tag . '</a></td>
            <td>
                <a href="' . route('admin.asettik.show', $asset->id) . '" class="font-weight-bold">' . $asset->name . '</a><br>
                <span class="text-muted">Serial No: </span>' . $asset->serial . '<br>
                <span class="text-muted">Status: </span>
                <span class="badge" style="background-color: ' . $asset->status->color . '; color: white;">' . $asset->status->name . '</span>
            </td>
            <td>
                <span class="badge" style="border:1px solid ' . $asset->category->color . ';color:' . $asset->category->color . ';">' . $asset->category->name . '</span>
            </td>
            <td>' . $asset->model->name . '</td>
            <td>' . $asset->user->username . '</td>
            <td>' . $asset->updated_at->format('Y-m-d') . '</td>
            <td>
                <div class="">
                    <div class="btn-group">
                        <a href="' . route('admin.asetrt.pemeliharaan', ['id' => $asset->id]) . '" type="button" class="btn btn-light">
                            <i class="fa-regular fa-calendar-check" style="color: green" data-toggle="tooltip" data-placement="top" title="Jadwal Pemeliharaan"></i>
                        </a>
                        <a href="#" type="button" class="btn btn-light" style="color: blue" data-toggle="tooltip" onclick="event.preventDefault(); showQrCodeModal(\'' . $asset->tag . '\', \'' . $asset->name . '\')" data-placement="top" title="QR Code">
                            <i class="fas fa-qrcode"></i>
                        </a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-outline dropdown-toggle" data-toggle="dropdown" data-toggle-second="tooltip" data-placement="top" title="More..."></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="mx-3" href="' . route('admin.asetrt.edit', ['id' => $asset->id]) . '">Edit</a>
                                </li>
                                <li>
                                    <span class="mx-3" data-toggle="modal" data-target="#deleteModal" data-id="' . $asset->id . '" data-name="' . $asset->name . '" style="color: #007bff; cursor: pointer;">Delete</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </td>
        </tr>';
        }

        if ($assets->isEmpty()) {
            $output = '<tr><td colspan="7" class="text-center">Tidak ada data ditemukan</td></tr>';
        }

        return response()->json([
            'html' => $output,
            'pagination' => $assets->appends($request->except('page'))->links('pagination::bootstrap-4')->toHtml()
        ]);
    }

    public function index_rt()
    {
        $manufacturers = ManufacturersModel::get();
        $models = ModelsModel::get();
        $suppliers = SuppliersModel::get();
        $locations = LocationsModel::get();
        $statuses = LabelsModel::get();
        $users = User::get();

        $categories = AssetcategoriesModel::whereIn('classification_id', [3, 4])->get();

        $assets = AssetsModel::with('category', 'status', 'model', 'user')->where('classification_id', 2)->latest()->paginate(10);

        $totalAssets = AssetsModel::where('classification_id', 3)->count();

        return view('admin.asetrt.index', compact('assets', 'totalAssets', 'categories', 'manufacturers', 'models', 'suppliers', 'locations', 'statuses', 'users'));
    }

    public function search_rt(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $assets = AssetsModel::with('category', 'status', 'model', 'user')
            ->where('classification_id', [3, 4])
            ->when($category, fn($query) => $query->where('category_id', $category))
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery->where('name', 'like', "%$search%")
                        ->orWhere('serial', 'like', "%$search%");
                });
            })
            ->latest()
            ->paginate($request->per_page ?? 10);

        $output = '';
        foreach ($assets as $asset) {
            $output .= '
        <tr>
            <td><a href="' . route('admin.asetrt.show', $asset->id) . '">' . $asset->tag . '</a></td>
            <td>
                <a href="' . route('admin.asetrt.show', $asset->id) . '" class="font-weight-bold">' . $asset->name . '</a><br>
                <span class="text-muted">Serial No: </span>' . $asset->serial . '<br>
                <span class="text-muted">Status: </span>
                <span class="badge" style="background-color: ' . $asset->status->color . '; color: white;">' . $asset->status->name . '</span>
            </td>
            <td>
                <span class="badge" style="border:1px solid ' . $asset->category->color . ';color:' . $asset->category->color . ';">' . $asset->category->name . '</span>
            </td>
            <td>' . $asset->model->name . '</td>
            <td>' . $asset->user->username . '</td>
            <td>' . $asset->updated_at->format('Y-m-d') . '</td>
            <td>
                <div class="">
                    <div class="btn-group">
                        <a href="' . route('admin.asetrt.pemeliharaan', ['id' => $asset->id]) . '" type="button" class="btn btn-light">
                            <i class="fa-regular fa-calendar-check" style="color: green" data-toggle="tooltip" data-placement="top" title="Jadwal Pemeliharaan"></i>
                        </a>
                        <a href="#" type="button" class="btn btn-light" style="color: blue" data-toggle="tooltip" onclick="event.preventDefault(); showQrCodeModal(\'' . $asset->tag . '\', \'' . $asset->name . '\')" data-placement="top" title="QR Code">
                            <i class="fas fa-qrcode"></i>
                        </a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-outline dropdown-toggle" data-toggle="dropdown" data-toggle-second="tooltip" data-placement="top" title="More..."></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="mx-3" href="' . route('admin.asetrt.edit', ['id' => $asset->id]) . '">Edit</a>
                                </li>
                                <li>
                                    <span class="mx-3" data-toggle="modal" data-target="#deleteModal" data-id="' . $asset->id . '" data-name="' . $asset->name . '" style="color: #007bff; cursor: pointer;">Delete</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </td>
        </tr>';
        }

        if ($assets->isEmpty()) {
            $output = '<tr><td colspan="7" class="text-center">Tidak ada data ditemukan</td></tr>';
        }

        return response()->json([
            'html' => $output,
            'pagination' => $assets->appends($request->except('page'))->links('pagination::bootstrap-4')->toHtml()
        ]);
    }

    public function store_tik(StoreAssetRequest $request)
    {
        $admin_id = auth()->user()->id;

        $checkTag = $this->incrementTag("tik");
        $newTag = $this->prefix_tik . '-' . $checkTag;

        $ceksupplier = SuppliersModel::firstOrNew(["id" => (int) $request->supplier_id[0]], ["name" => $request->supplier_id[0]]);
        $ceksupplier->save();
        $request->merge(["supplier_id" => $ceksupplier->id]);

        $cekmanufacturer = ManufacturersModel::firstOrNew(["id" => (int) $request->manufacturer_id[0]], ["name" => $request->manufacturer_id[0]]);
        $cekmanufacturer->save();
        $request->merge(["manufacturer_id" => $cekmanufacturer->id]);

        $cekmodel = ModelsModel::firstOrNew(["id" => (int) $request->model_id[0]], ["name" => $request->model_id[0]]);
        $cekmodel->save();
        $request->merge(["model_id" => $cekmodel->id]);

        $data = [
            'classification_id' => (int) $this->classification_tik_id,
            'category_id' => (int) $request->category_id,
            'admin_id' => (int) $admin_id,
            'client_id' => (int) $this->client_id,
            'user_id' => (int) $request->user_id,
            'manufacturer_id' => (int) $request->manufacturer_id,
            'model_id' => (int) $request->model_id,
            'supplier_id' => (int) $request->supplier_id,
            'status_id' => (int) $request->status_id,
            'purchase_date' => Carbon::parse($request->purchase_date)->format('Y-m-d'),
            'warranty_months' => (int) $request->warranty_months,
            'tag' => $newTag,
            'name' => $request->name,
            'serial' => $request->serial,
            'notes' => $request->notes,
            'location_id' => (int) $request->location_id,
            'customfields' => $request->customfields,
            'qrvalue' => $request->qrvalue,
        ];

        $aset = AssetsModel::Create($data);

        // kirim notifikasi
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['superadmin', 'admin_tik', 'staf_tik']);
        })->get();

        foreach ($users as $user) {
            $user->notify(new CreateAsetTik($aset));
        }
    }

    public function store_rt(StoreAssetRequest $request)
    {
        $admin_id = auth()->user()->id;

        $checkTag = $this->incrementTag("rt");
        $newTag = $this->prefix_rt . '-' . $checkTag;

        $ceksupplier = SuppliersModel::firstOrNew(["id" => (int) $request->supplier_id[0]], ["name" => $request->supplier_id[0]]);
        $ceksupplier->save();
        $request->merge(["supplier_id" => $ceksupplier->id]);

        $cekmanufacturer = ManufacturersModel::firstOrNew(["id" => (int) $request->manufacturer_id[0]], ["name" => $request->manufacturer_id[0]]);
        $cekmanufacturer->save();
        $request->merge(["manufacturer_id" => $cekmanufacturer->id]);

        $cekmodel = ModelsModel::firstOrNew(["id" => (int) $request->model_id[0]], ["name" => $request->model_id[0]]);
        $cekmodel->save();
        $request->merge(["model_id" => $cekmodel->id]);

        $data = [
            'classification_id' => (int) $this->classification_rt_id,
            'category_id' => (int) $request->category_id,
            'admin_id' => (int) $admin_id,
            'client_id' => (int) $this->client_id,
            'user_id' => (int) $request->user_id,
            'manufacturer_id' => (int) $request->manufacturer_id,
            'model_id' => (int) $request->model_id,
            'supplier_id' => (int) $request->supplier_id,
            'status_id' => (int) $request->status_id,
            'purchase_date' => Carbon::parse($request->purchase_date)->format('Y-m-d'),
            'warranty_months' => (int) $request->warranty_months,
            'tag' => $newTag,
            'name' => $request->name,
            'serial' => $request->serial,
            'notes' => $request->notes,
            'location_id' => (int) $request->location_id,
            'customfields' => $request->customfields,
            'qrvalue' => $request->qrvalue,
        ];

        $aset = AssetsModel::Create($data);

        // kirim notifikasi
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['superadmin', 'admin_rt']);
        })->get();

        foreach ($users as $user) {
            $user->notify(new CreateAsetRT($aset));
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $asset = AssetsModel::findOrFail($id);

        // kirim notifikasi
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['superadmin', 'admin_tik', 'staf_tik']);
        })->get();

        foreach ($users as $user) {
            $user->notify(new DeleteAsetTik($asset));
        }

        $asset->delete();
        
    }

    public function show($id)
    {
        //
    }

    public function incrementTag($classification)
    {
        if ($classification === 'tik') {
            $prefix = $this->prefix_tik;
        }

        if ($classification === 'rt') {
            $prefix = $this->prefix_rt;
        }

        $lastTag = AssetsModel::where('tag', 'like', $prefix . '-%')
            ->orderByRaw("CAST(SUBSTRING_INDEX(tag, '-', -1) AS UNSIGNED) DESC")
            ->first();

        if ($lastTag) {
            $lastSequenceNumber = (int) str_replace($prefix . '-', '', $lastTag->tag);
            return $lastSequenceNumber + 1;
        } else {
            return 1;
        }
    }
}
