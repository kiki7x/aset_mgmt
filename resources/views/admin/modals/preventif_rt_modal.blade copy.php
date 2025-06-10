@push('script-head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<!-- Modal Pemeliharaan Preventif -->
<div class="modal fade" id="modalJadwalPemeliharaan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalJadwalPemeliharaanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalJadwalPemeliharaanLabel">Jadwalkan Pemeliharaan Preventif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formJadwalPemeliharaan">
                    {{-- Nama Barang --}}
                    <div class="form-group">
                        <label for="jenisBarang">Nama Barang</label>
                        <input class="form-control" type="text" value="{{ $assets->tag }} - {{ $assets->name }}" readonly>
                    </div>
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
                        <label for="frequency">Frekuensi Pemeliharaan:</label>
                        <select class="form-control" id="frequency" name="frequency">
                            <option value="">-- Pilih --</option>
                            <option value="3">Setiap 3 bulan sekali</option>
                            <option value="4">Setiap 4 bulan sekali</option>
                            <option value="6">Setiap 6 bulan sekali</option>
                            <option value="12">Setiap 12 bulan sekali</option>
                        </select>
                    </div>
                    <!-- Tanggal Mulai -->
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai <span class="text-danger">*</span></label>
                        <div>
                            <input id="start_date" width="276" type="text" class="form-control" name="start_date" placeholder="Select date" />
                        </div>
                        @error('form.purchase_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button id="submitJadwalPemeliharaan" type="submit" class="btn btn-primary">Jadwalkan</button>
            </div>
            </form>
        </div>
    </div>
</div>

@push('script-foot')
    {{-- Laravel javascript Validation --}}
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\JadwalPemeliharaanRequest', '#formJadwalPemeliharaan') !!}


    <script>
    // Pastikan dokumen siap sebelum menjalankan script jQuery
    $(document).ready(function() {

    // Event listener untuk perubahan pada dropdown 'Jenis Barang'
    $('#jenisBarang').on('change', function() {
    var jenis = $(this).val(); // Ambil nilai yang dipilih

    // Sembunyikan semua bagian form detail terlebih dahulu
    $('#formKendaraan').hide();
    $('#formElektronik').hide();
    $('#formTIK').hide();

    // Tampilkan bagian form yang sesuai berdasarkan pilihan
    if (jenis === 'kendaraan') {
    $('input[name="kendaraan_tasks[]"]').prop('checked', false); // Uncheck semua radio buttons
    $('#formKendaraan').removeClass('d-none').show();
    } else if (jenis === 'elektronik') {
    $('input[name="elektronik_tasks[]"]').prop('checked', false); // Uncheck semua radio buttons
    $('#formElektronik').removeClass('d-none').show();
    } else if (jenis === 'tik') {
    $('input[name="tik_tasks[]"]').prop('checked', false); // Uncheck semua radio buttons
    $('#formTIK').removeClass('d-none').show();
    }
    });

    // Event listener untuk submit form pemeliharaan preventif
    $('#formJadwalPemeliharaan').on('submit', function(e) {
    e.preventDefault();

    // Serialize semua data form menjadi string URL-encoded
    const formData = new FormData(this);

    // Lakukan permintaan Ajax POST ke endpoint Laravel
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{ route('admin.asetrt.pemeliharaan.preventifStore', $id) }}",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(response) {
    alert(response.message);
    $('#modalJadwalPemeliharaan').modal('hide');
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(jqXHR.responseText);
    alert(jqXHR.responseText);
    }
    });
    });

    // Inisialisasi: Picu event 'change' pada 'jenisBarang' saat halaman dimuat
    // Ini memastikan bagian form yang benar ditampilkan jika ada nilai default
    $('#jenisBarang').trigger('change');
    });
    </script>
@endpush
