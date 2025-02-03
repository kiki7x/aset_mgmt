<form wire:submit.prevent="update">
    <div class="card-body">
        <div class="row form-group">
            <div class="form-group col-md-4">
                <label for="tag">Tag Aset *</label>
                <input wire:model="form.tag" value="{{ $asset->tag }}" type="text" name="tag" class="form-control" id="tag" placeholder="Asset Tag">
                @error('form.tag')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Asset Name -->
            <div class="form-group col-md-8">
                <label for="name">Nama Aset *</label>
                <input wire:model="form.name" value="{{ $asset->name }}" name="name" class="form-control" id="name" placeholder="Asset Name">
                @error('form.name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Category -->
            <div class="form-group col-md-4">
                <div x-data="{
                    selectedCategory: @entangle('form.category'),
                    initCategory() {
                        // Inisialisasi Select2 menggunakan ID
                        $(this.$refs.selectcategory).on('change', (e) => {
                            // singkronisasi perubahan ke alpinejs
                            this.selectedCategory = $(e.target).val();
                        });
                    },
                }" x-init="initCategory()">
                    <label for="category">Kategori</label>
                    <select wire:model="form.category" x-ref="selectcategory" name="category" id="category" class="form-control select2" for="category">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Supplier -->
            <div class="form-group col-md-4">
                <div x-data="{
                    selectedSupplier: @entangle('form.supplier'),
                    initSupplier() {
                        // Set nilai awal Select2 saat edit
                        // inisialisasi select2                                
                        $(this.$refs.select2supplier).on('change', (e) => {
                            // singkronisasi perubahan ke alpinejs
                            this.selectedSupplier = $(e.target).val() ? $(e.target).val()[0] : null;
                        });
                    }
                }" x-init="initSupplier()">
                    <label for="supplier">Supplier</label>
                    <select wire:model="form.supplier" x-ref="select2supplier" name="supplier" id="supplier" class="form-control select2tag" multiple="multiple">
                        @foreach ($suppliers as $sup)
                            <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.supplier')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Location -->
            <div class="form-group col-md-4">
                <div x-data="{
                    selectedLocation: @entangle('form.location'),
                    initLocation() {
                        // Inisialisasi Select2 menggunakan ID
                        $(this.$refs.selectlocation).on('change', (e) => {
                            // singkronisasi perubahan ke alpinejs
                            this.selectedLocation = $(e.target).val();
                        });
                    }
                }" x-init="initLocation()">
                    <label for="location">Lokasi</label>
                    <select wire:model="form.location" x-ref="selectlocation" name="location" id="location" class="form-control select2" for="location">
                        <option name="location" id="location" value="">Pilih...</option>
                        @foreach ($locations as $loc)
                            <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.location')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Manufacturer -->
            <div class="form-group col-md-4">
                <div x-data="{
                    selectedManufacturer: @entangle('form.manufacturer'),
                    initManufacturer() {
                        $(this.$refs.select2manufacturer).on('change', (e) => {
                            // singkronisasi perubahan ke alpinejs
                            this.selectedManufacturer = $(e.target).val() ? $(e.target).val()[0] : null;
                        });
                    },
                }" x-init="initManufacturer()">
                    <label for="manufacturer">Pabrikan/Merk</label>
                    <select wire:model="form.manufacturer" x-ref="select2manufacturer" name="manufacturer" id="manufacturer" class="select2tag" for="manufacturer" multiple="multiple">
                        @foreach ($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.manufacturer')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Model/Tipe -->
            <div class="form-group col-md-4">
                <div x-data="{
                    selectedModel: @entangle('form.model'),
                    initModel() {
                        $(this.$refs.select2model).on('change', (e) => {
                            // singkronisasi perubahan ke alpinejs
                            this.selectedModel = $(e.target).val() ? $(e.target).val()[0] : null;
                        });
                    },
                }" x-init="initModel()">
                    <label for="model">Model/Tipe</label>
                    <select wire:model="form.model" x-ref="select2model" name="model" id="model" class="select2tag" for="model" data-placeholder="Pilih.../tambahkan" multiple="multiple">
                        @foreach ($models as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.model')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Serial Number -->
            <div class="form-group col-md-4">
                <label for="serial">Serial Number</label>
                <input wire:model="form.serial" name="serial" type="text" class="form-control" id="serial" placeholder="Serial Number">
                @error('form.serial')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Status/Label -->
            <div class="form-group col-md-4">
                <div x-data="{
                    selectedStatus: @entangle('form.status'),
                    initStatus() {
                        // Inisialisasi Select2 menggunakan ID
                        $(this.$refs.selectstatus).on('change', (e) => {
                            // singkronisasi perubahan ke alpinejs
                            this.selectedStatus = $(e.target).val();
                        });
                    }
                }" x-init="initStatus()">
                    <label for="status">Status *</label>
                    <select wire:model="form.status" x-ref="selectstatus" name="status" id="status" class="form-control select2" for="status">
                        <option name="status" id="status" value="">Pilih...</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Asset User -->
            <div class="form-group col-md-4">
                <div x-data="{
                    selectedUseraset: @entangle('form.useraset'),
                    initUseraset() {
                        // Inisialisasi Select2 menggunakan ID
                        $(this.$refs.selectuseraset).on('change', (e) => {
                            // singkronisasi perubahan ke alpinejs
                            this.selectedUseraset = $(e.target).val();
                        });
                    }
                }" x-init="initUseraset()">
                    <label for="useraset">User Aset</label>
                    <select wire:model="form.useraset" x-ref="selectuseraset" name="useraset" id="useraset" class="form-control select2">
                        <option name="useraset" id="useraset" value="">Pilih...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.useraset')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Asset Admin -->
            <div class="form-group col-md-4">
                <div x-data="{
                    selectedAdminaset: @entangle('form.adminaset'),
                    initAdminaset() {
                        // Inisialisasi Select2 menggunakan ID
                        $(this.$refs.selectadminaset).on('change', (e) => {
                            // singkronisasi perubahan ke alpinejs
                            this.selectedAdminaset = $(e.target).val();
                        });
                    }
                }" x-init="initAdminaset()">
                    <label for="adminaset">Admin Aset</label>
                    <select wire:model="form.adminaset" x-ref="selectadminaset" name="adminaset" id="adminaset" class="form-control select2">
                        <option name="adminaset" id="adminaset" value="">Pilih...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.adminaset')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Tanggal Perolehan -->
            <div class="form-group col-md-6">
                <label for="purchaseDateInput">Tanggal Perolehan:</label>
                <div wire:ignore>
                    <x-flatpickr wire:model="form.purchase_date" value="{{ $form->purchase_date }}" name="purchase_date" id="purchaseDateInput" placeholder="Select date" />
                </div>
                @error('form.purchase_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Garansi -->
            <div class="form-group col-md-6">
                <label for="warranty_months">Garansi</label>
                <div class="input-group">
                    <input wire:model="form.warranty_months" name="warranty_months" type="number" class="form-control" id="warranty_months">
                    <div class="input-group-append">
                        <span class="input-group-text">bulan</span>
                    </div>
                </div>
                @error('form.warranty_months')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Notes -->
            <div class="form-group col-md-12">
                <label for="notes">Catatan</label>
                <textarea wire:model="form.notes" name="notes" id="notes" class="form-control" rows="0" placeholder="Write notes here..."></textarea>
            </div>
            @error('form.notes')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-block justify-content-end">
            <!-- Submit Button -->
            <button wire:click="resetInput" type="button" class="btn btn-info">Reset</button>
            <a href="{{ route('admin.asettik.show', ['id' => $asset->id]) }}" type="button" class="btn btn-info">Batal</a>
            <button wire:click="update" type="submit" class="btn btn-primary">Simpan</button>
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
