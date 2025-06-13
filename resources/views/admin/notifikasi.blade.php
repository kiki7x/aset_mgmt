@extends('layouts.backsite', [
    'title' => 'Pusat Notifikasi | SAPA PPL',
    'welcome' => 'Pusat Notifikasi',
    'breadcrumb' => 'Pusat Notifikasi',
])


@section('content')
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-md sticky top-8">
            <div class="p-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold">Pusat Notifikasi (Simulasi)</h2>
                <p class="text-sm text-gray-500">Hasil dari kode di sebelah kiri akan muncul di sini.</p>
            </div>

            <div class="p-4">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="font-semibold text-gray-800">Belum Dibaca (<span id="unread-count">0</span>)</h3>
                    <button id="mark-all-read" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium disabled:text-gray-400 disabled:cursor-not-allowed" disabled>Tandai semua dibaca</button>
                </div>
                <div id="unread-notifications" class="space-y-3 mb-6">
                    <p id="no-unread" class="text-gray-500 text-sm">Tidak ada notifikasi baru.</p>
                </div>

                <h3 class="font-semibold text-gray-800 border-t border-gray-200 pt-4 mb-3">Riwayat</h3>
                <div id="read-notifications" class="space-y-3">
                    <p id="no-read" class="text-gray-500 text-sm">Tidak ada riwayat notifikasi.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
