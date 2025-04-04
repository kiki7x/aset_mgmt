<form wire:submit.prevent="update">
    <div class="card-body">
        <div class="row form-group">
            <div class="form-group col-md-4">
                <label for="name">Nama Klasifikasi *</label>
                <input wire:model.defer="form.name" type="text" name="name" class="form-control" id="name" placeholder="Nama Klasifikasi">
                @error('form.name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="color">Color *</label>
                <input wire:model.defer="form.color" type="text" name="color" class="form-control" id="color" placeholder="Color">
                @error('form.color')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="classification_id">Klasifikasi *</label>
                <select wire:model.defer="form.classification_id" class="form-control">
                    <option value="" hidden>Pilih Klasifikasi</option>
                    @foreach ($classifications as $classification)
                        <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                    @endforeach
                </select>
                
                @error('form.classification_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="d-block justify-content-end">
            <button wire:click="resetInput" type="button" class="btn btn-secondary">Reset</button>
            <a href="{{ route('admin.setting_attr.kategori.show', ['id' => $asset->id]) }}" class="btn btn-warning">Batal</a>
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
</form>

@push('script')
    {{-- Include plugin --}}
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let selectEl = $('#classification_id');

            function initSelect2() {
                selectEl.select2({
                    theme: 'bootstrap4',
                    width: '100%',
                    placeholder: 'Pilih Klasifikasi'
                });

                // Sync ke Livewire saat nilai berubah
                selectEl.on('change', function () {
                    Livewire.dispatch('setClassification', { value: $(this).val() });
                });
            }

            initSelect2();

            // Reinit saat Livewire merender ulang
            Livewire.hook('message.processed', () => {
                initSelect2();
                // set ulang value dari Livewire ke Select2
                selectEl.val(@this.form.classification_id).trigger('change');
            });
        });
    </script>
@endpush

