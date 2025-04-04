<form wire:submit.prevent="update">
    <div class="card-body">
        <div class="row form-group">
            <div class="form-group col-md-4">
                <label for="tag">Nama KLasifikasi *</label>
                <input wire:model="form.name" value="{{ $asset->name }}" type="text" name="name" class="form-control" id="name" placeholder="Nama Klasifikasi">
                @error('form.name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="d-block justify-content-end">
            <!-- Submit Button -->
            <button wire:click="resetInput" type="button" class="btn btn-secondary">Reset</button>
            <a href="{{ route('admin.asettik.show', ['id' => $asset->id]) }}" type="button" class="btn btn-warning">Batal</a>
            <button wire:click="update" type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
</form>
@push('script')
    @script
        <script>
            document.addEventListener('livewire:initialized', function() {
                function reinitSelect2() {
                    $('.select2').select2({
                        theme: 'bootstrap4',
                        width: '100%'
                    });
                }

                function reinitSelect2tag() {
                    $('.select2tag').select2({
                        theme: 'bootstrap4',
                        tags: true,
                        width: '100%',
                        multiple: true,
                        maximumSelectionLength: 1,
                        placeholder: 'Pilih.../tambahkan',
                    });
                }
                // init
                reinitSelect2();
                reinitSelect2tag();
                // hook
                Livewire.hook('morphed', () => {
                    reinitSelect2();
                    reinitSelect2tag();
                })
            })
        </script>
    @endscript
    {{-- date-picker --}}
    <x-flatpickr::script />
    <!-- InputMask -->
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    {{-- Select2 --}}
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush
