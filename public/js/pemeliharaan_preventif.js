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
            $('#formKendaraan').removeClass('d-none').show();
        } else if (jenis === 'elektronik') {
            $('#formElektronik').removeClass('d-none').show()();
            // Atur jadwal default jika diperlukan, atau biarkan pengguna memilih
            $('#jadwalElektronik').val(''); // Reset pilihan jadwal
        } else if (jenis === 'tik') {
            $('#formTIK').removeClass('d-none').show();
        }
    });

    // Event listener untuk submit form pemeliharaan preventif
    $('#preventiveMaintenanceForm').on('submit', function(e) {
        e.preventDefault(); // Mencegah perilaku submit form default (reload halaman)

        // Serialize semua data form menjadi string URL-encoded
        var formData = $(this).serialize();
        // Ambil CSRF token dari meta tag untuk keamanan Laravel
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Lakukan permintaan Ajax POST ke endpoint Laravel
        $.ajax({
            url: '/jadwal-preventif', // URL endpoint Laravel untuk menyimpan jadwal
            type: 'POST',             // Metode HTTP
            data: formData,           // Data form yang akan dikirim
            headers: {
                'X-CSRF-TOKEN': csrfToken // Sertakan CSRF token di header permintaan
            },
            success: function(response) {
                // Callback jika permintaan berhasil
                if (response.success) {
                    // Tampilkan pesan sukses (gunakan modal kustom jika tidak ingin alert)
                    alert('Jadwal pemeliharaan berhasil disimpan! ' + response.message);
                    $('#jadwalPreventifModal').modal('hide'); // Tutup modal
                    // Opsional: refresh halaman atau update bagian UI lain
                    // location.reload();
                } else {
                    // Tampilkan pesan gagal jika ada masalah di server
                    alert('Gagal menyimpan jadwal: ' + response.message);
                    // Tampilkan error validasi jika ada
                    if (response.errors) {
                        console.error('Error validasi:', response.errors);
                        // Anda bisa menampilkan error ini di samping input form yang relevan
                    }
                }
            },
            error: function(xhr, status, error) {
                // Callback jika ada kesalahan pada permintaan Ajax
                var errorMessage = 'Terjadi kesalahan tidak dikenal.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (error) {
                    errorMessage = error;
                }
                alert('Terjadi kesalahan saat menyimpan jadwal: ' + errorMessage);
                console.error("AJAX Error:", status, error, xhr.responseText);
            }
        });
    });

    // Inisialisasi: Picu event 'change' pada 'jenisBarang' saat halaman dimuat
    // Ini memastikan bagian form yang benar ditampilkan jika ada nilai default
    $('#jenisBarang').trigger('change');
});
