@extends('layouts.backsite-navtab-asetrt')

@section('content-tab')
    <div class="container-fluid">
        <div class="row align-items-center mb-3">
            <h2 class="col-8">Daftar Pemeliharaan</h2>
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPemeliharaan"><i class="fa-regular fa-clock"></i> Preventif</button>
            </div>
            <div class="col d-flex justify-content-start">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKorektif"><i class="fa-solid fa-screwdriver-wrench"></i> Korektif</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="maintenanceTable">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Tipe Pemeliharaan</th>
                        <th>Tanggal Pemeliharaan</th>
                        <th>Jadwal Preventif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($maintenances as $maintenance)
                        <tr id="row_{{ $maintenance->id }}">
                            <td>{{ $loop->iteration }}</td>
                            {{-- nama pemeliharaan eg. inspeksi, pelumasan, pembersihan, dll --}}
                            <td>{{ $maintenance->name }}</td>
                            {{-- preventif atau korektif --}}
                            <td>{{ $maintenance->type }}</td>
                            <td>{{ ucfirst($maintenance->schedule) }}</td>
                            <td>{{ $maintenance->maintenance_date ? \Carbon\Carbon::parse($maintenance->maintenance_date)->format('d-m-Y') : '-' }}</td>
                            <td>
                                @if ($maintenance->preventive_schedule)
                                    @switch($maintenance->preventive_schedule)
                                        @case('triwulan')
                                            Per 3 Bulan Sekali
                                        @break

                                        @case('caturwulan')
                                            Per 4 Bulan Sekali
                                        @break

                                        @case('semester')
                                            Per 6 Bulan Sekali
                                        @break
                                    @endswitch
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info edit-btn" data-id="{{ $maintenance->id }}" data-bs-toggle="modal" data-bs-target="#maintenanceModal" data-mode="edit">Edit</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $maintenance->id }}">Hapus</button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data pemeliharaan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalPemeliharaan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPemeliharaanLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalPemeliharaanLabel">Form Pemeliharaan Preventif</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- Nama Barang --}}
                            <input class="form-control" type="text" placeholder="__Nama Barang__" readonly>
                            {{-- Tipe Barang --}}
                            <div class="form-group">
                                <label for="jenisBarang">Tipe Barang</label>
                                <select class="form-control" id="jenisBarang" required>
                                    <option>None</option>
                                    <option value="kendaraan">Kendaraan</option>
                                    <option value="elektronik">Mesin/Elektronik</option>
                                    <option value="tik">TIK</option>
                                </select>
                            </div>

                            <div id="formKendaraan" class="d-none form-group border p-3 bg-light">
                                <label for="detailKendaraan" class="text-primary font-weight-normal">Detail Pemeliharaan Kendaraan:</label>
                                <p class="text-muted small">Pilih tugas pemeliharaan yang relevan.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kendaraan_tasks[]" value="pajak_stnk" id="taskPajakStnk">
                                    <label class="form-check-label" for="taskPajakStnk">1. Pajak STNK</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kendaraan_tasks[]" value="tune_up" id="taskTuneUp">
                                    <label class="form-check-label" for="taskTuneUp">2. Tune Up</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kendaraan_tasks[]" value="pelumasan" id="taskPelumasan">
                                    <label class="form-check-label" for="taskPelumasan">3. Pelumasan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kendaraan_tasks[]" value="inspeksi_radiator" id="taskInspeksiRadiator">
                                    <label class="form-check-label" for="taskInspeksiRadiator">4. Inspeksi Radiator</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kendaraan_tasks[]" value="inspeksi_mesin" id="taskInspeksiMesin">
                                    <label class="form-check-label" for="taskInspeksiMesin">5. Inspeksi Mesin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kendaraan_tasks[]" value="inspeksi_ac" id="taskInspeksiAC">
                                    <label class="form-check-label" for="taskInspeksiAC">6. Inspeksi AC</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kendaraan_tasks[]" value="inspeksi_ban" id="taskInspeksiBan">
                                    <label class="form-check-label" for="taskInspeksiBan">7. Inspeksi Ban</label>
                                </div>
                            </div>

                            <div id="formElektronik" class="d-none p-3 border rounded mb-3 bg-light">
                                <label class="text-primary font-weight-normal">Detail Pemeliharaan Elektronik:</label>
                                <div class="form-group">
                                    <label>Tugas:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="elektronik_tasks[]" value="pembersihan_inspeksi" id="elektronikPembersihanInspeksi" checked>
                                        <label class="form-check-label" for="elektronikPembersihanInspeksi">Pembersihan & Inspeksi</label>
                                    </div>
                                </div>
                            </div>

                            <div id="formTIK" class="d-none p-3 border rounded mb-3 bg-light">
                                <label class="text-primary font-weight-normal">Detail Pemeliharaan TIK:</label>
                                <div class="form-group">
                                    <label>Tugas:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tik_tasks[]" value="pembersihan_inspeksi" id="tikPembersihanInspeksi" checked>
                                        <label class="form-check-label" for="tikPembersihanInspeksi">Pembersihan & Inspeksi</label>
                                    </div>
                                </div>
                            </div>
                            {{-- Jadwal Pemeliharaan --}}
                            <div class="form-group">
                                <label for="jadwal">Jadwal Pemeliharaan:</label>
                                <select class="form-control" id="jadwal" name="jadwal">
                                    <option value="">-- Pilih Jadwal --</option>
                                    <option value="3">Setiap 3 bulan sekali</option>
                                    <option value="4">Setiap 4 bulan sekali</option>
                                    <option value="6">Setiap 6 bulan sekali</option>
                                    <option value="12">Setiap 12 bulan sekali</option>
                                </select>
                            </div>
                            <!-- Tanggal Mulai -->
                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai <span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" class="datepicker form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Select date" />
                                </div>
                                @error('form.purchase_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('script-foot')
        <script>$('#tanggal_mulai').datepicker();</script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" xintegrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" xintegrity="sha384-xOolHFLEh07PJGoPkLv1b5hQby+MXeArB+wEwNteaeNaoTxMXxSR1GAsXpkmFMX2" crossorigin="anonymous"></script>
        <script src="{{ asset('js/pemeliharaan_preventif.js') }}"></script>
    @endpush
