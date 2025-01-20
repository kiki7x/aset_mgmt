<div>
    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Aset</h5>
                    <button type="button" class="close" wire:click="closeModalEdit">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form wire:submit.prevent="updateAsset">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" class="form-control" wire:model="asset.name">
                        </div>
                        <div class="mb-3">
                            <label for="serial" class="form-label">Serial</label>
                            <input type="text" id="serial" class="form-control" wire:model="asset.serial">
                        </div>
                        {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
                    </div>
                    <div class="modal-footer">
                        <button wire:click="closeModalEdit" type="button" class="btn btn-secondary">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        // Event untuk membuka modal
        window.addEventListener('showModalEdit', () => {
            const modal = new bootstrap.Modal(document.getElementById('modalEdit'));
            modal.show();
        });
    </script>
    <script>
        // Even untuk menutup modal
        window.addEventListener('closeModalEdit', () => {
            $('#modalEdit').modal('hide');
            $('.modal-backdrop').fadeOut(250);
        })
    </script>
@endpush
