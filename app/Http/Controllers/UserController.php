<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil query builder untuk model User
        $query = \App\Models\User::query();

        if ($request->filled('username')) {
            $query->where('username', 'like', '%' . $request->input('username') . '%');
        }
        // Filter berdasarkan nama (jika ada input 'name' di request)
        if ($request->filled('fullname')) {
            $query->where('fullname', 'like', '%' . $request->input('fullname') . '%');
        }

        // Filter berdasarkan email (jika ada input 'email' di request)
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
        
        // Filter berdasarkan tanggal pendaftaran (jika ada input 'registration_date' di request)
        if ($request->filled('registration_date')) {
            $query->whereDate('created_at', $request->input('registration_date'));
        }

        // Mengurutkan berdasarkan ID secara descending (pengguna terbaru dulu)
        // Anda bisa mengubah ini sesuai kebutuhan, misalnya 'name', 'asc'
        $query->orderBy('id', 'asc');

        // Melakukan paginasi terhadap hasil query
        // Angka 10 menunjukkan jumlah item per halaman
        $users = $query->paginate(10)->withQueryString(); // withQueryString() untuk menjaga parameter filter saat paginasi

        // Mengirim data pengguna dan input filter ke view
        return view('admin.usermanager', [
            'users' => $users,
            'filterUsername' => $request->input('username'),
            'filterFullname' => $request->input('fullname'),
            'filterEmail' => $request->input('email'),
        ]);
    }

    public function profil($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('admin.userprofil', compact('user'));
    }
}
