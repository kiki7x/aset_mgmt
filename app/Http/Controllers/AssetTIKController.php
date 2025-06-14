<?php

namespace App\Http\Controllers;

use App\Models\AssetcategoriesModel;
use App\Models\AssetsModel;
use Illuminate\Http\Request;

class AssetTIKController extends Controller
{
    public function index()
    {
        $categories = AssetcategoriesModel::whereIn('classification_id', [2])->get();

        $assets = AssetsModel::with('category', 'status', 'model', 'user')->where('classification_id', 2)->latest()->paginate(10);

        $totalAssets = AssetsModel::where('classification_id', 2)->count();

        return view('admin.asettik.index', compact('assets', 'totalAssets', 'categories'));
    }

    public function search(Request $request)
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
            <td>' . $asset->user->name . '</td>
            <td>' . $asset->updated_at->format('Y-m-d') . '</td>
            <td>
                <a href="' . route('admin.asettik.show', $asset->id) . '/edit" class="btn btn-sm btn-primary">Edit</a>
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




    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function show($id)
    {
        //
    }
}
