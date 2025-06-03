<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.usermanager', [
            'filterUsername' => $request->input('username'),
            'filterFullname' => $request->input('fullname'),
            'filterEmail' => $request->input('email'),
        ]);
    }

    public function fetchUsers(Request $request): JsonResponse
    {
        $query = \App\Models\User::query();

        if ($request->filled('username')) {
            $query->where('username', 'like', '%' . $request->input('username') . '%');
        }

        if ($request->filled('fullname')) {
            $query->where('fullname', 'like', '%' . $request->input('fullname') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        $query->orderBy('id', 'asc');
        $users = $query->paginate(3)->withQueryString();

        return response()->json([
            'data' => $users->items(),
            'links' => $users->links('pagination::bootstrap-5')->toHtml(),
            'total' => $users->total(),
            'current_page' => $users->currentPage(),
            'per_page' => $users->perPage(),
            'from' => $users->firstItem(),
            'to' => $users->lastItem(),
        ]);
    }

    public function fetchUser($id): JsonResponse
    {
        $user = \App\Models\User::findOrFail($id);
        return response()->json($user);
    }
    
}