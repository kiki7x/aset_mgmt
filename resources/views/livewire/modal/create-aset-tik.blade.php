<div>
<div wire:ignore.self class="modal fade" role="dialog" id="modalCreate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Aset TIK</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit="store" autocomplete="off">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row form-group">
                                <div class="form-group col-md-4">
                                    <label for="tag">Tag Aset *</label>
                                    <input wire:model="form.tag" type="text" name="tag" class="form-control" id="tag" placeholder="Asset Tag">
                                    @error('form.tag')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Asset Name -->
                                <div class="form-group col-md-8">
                                    <label for="name">Nama Aset *</label>
                                    <input wire:model="form.name" type="text" name="name" class="form-control" id="name" placeholder="Asset Name">
                                    @error('form.name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Category -->
                                <div class="form-group col-md-4">
                                    <div wire:ignore 
                                    x-data="{
                                        selectedCategory: @entangle('form.category'),
                                        init() {
                                            // Inisialisasi Select2 menggunakan ID
                                            $(this.$refs.selectcategory).select2({
                                                width: '100%',
                                                theme: 'bootstrap4'
                                            }).on('change', (e) => {
                                                // singkronisasi perubahan ke alpinejs
                                                this.selectedCategory = $(e.target).val();
                                            });
                                        }
                                    }" x-init="init()"
                                    >
                                        <label for="category">Kategori</label>
                                        <select wire:model="form.category" x-ref="selectcategory" name="category" id="category" class="form-control select2" for="category">
                                            <option name="category" value="">Pilih...</option>
                                            @foreach ($form_categories as $cat)
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
                                    <div wire:ignore 
                                    x-data="{
                                        selectedTags: @entangle('form.supplier'),
                                        init() {
                                            // inisialisasi select2                                
                                            $(this.$refs.select2supplier).select2({
                                                tags: true,
                                                maximumSelectionLength: 1,
                                                placeholder: 'Pilih.../tambahkan',
                                                width: '100%',
                                            }).on('change', (e) => {
                                                // singkronisasi perubahan ke alpinejs
                                                this.selectedTags = $(e.target).val() ? $(e.target).val()[0] : null;
                                            });
                                    
                                            // Override event wheel untuk menandai sebagai passive
                                            this.$refs.select2supplier.addEventListener('wheel', (e) => {}, { passive: true });
                                    
                                        }
                                    }" x-init="init()" for="supplier"
                                    >
                                        <label for="supplier">Supplier</label>
                                        <select wire:model="form.supplier" x-ref="select2supplier" name="supplier" id="supplier" class="select2tag" data-placeholder="Pilih.../tambahkan" multiple="multiple">
                                            @foreach ($form_suppliers as $sup)
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
                                    <div wire:ignore 
                                    x-data="{
                                        selectedLocation: @entangle('form.location'),
                                        init() {
                                            // Inisialisasi Select2 menggunakan ID
                                            $(this.$refs.selectlocation).select2({
                                                width: '100%',
                                                theme: 'bootstrap4'
                                            }).on('change', (e) => {
                                                // singkronisasi perubahan ke alpinejs
                                                this.selectedLocation = $(e.target).val();
                                            });
                                        }
                                    }" x-init="init()"
                                    >
                                        <label for="location">Lokasi</label>
                                        <select wire:model="form.location" x-ref="selectlocation" name="location" id="location" class="form-control select2" for="location">
                                            <option name="location" id="location" value="null">Pilih...</option>
                                            @foreach ($form_locations as $loc)
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
                                    <div wire:ignore 
                                    x-data="{
                                        selectedManufacturer: @entangle('form.manufacturer'),
                                        init() {
                                            // inisialisasi select2
                                            $(this.$refs.select2manufacturer).select2({
                                                tags: true,
                                                maximumSelectionLength: 1,
                                                placeholder: 'Pilih.../tambahkan',
                                                width: '100%',
                                            }).on('change', (e) => {
                                                // singkronisasi perubahan ke alpinejs
                                                this.selectedManufacturer = $(e.target).val() ? $(e.target).val()[0] : null;
                                            });
                                    
                                            // Override event wheel untuk menandai sebagai passive
                                            this.$refs.select2manufacturer.addEventListener('wheel', (e) => {}, { passive: true });
                                        },
                                    }"
                                    >
                                        <label for="manufacturer">Pabrikan/Merk</label>
                                        <select wire:model="form.manufacturer" x-ref="select2manufacturer" name="manufacturer" id="manufacturer" class="select2tag" for="manufacturer" data-placeholder="Pilih.../tambahkan" multiple="multiple">
                                            @foreach ($form_manufacturers as $manufacturer)
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
                                    <div wire:ignore 
                                    x-data="{
                                        selectedModel: @entangle('form.model'),
                                        init() {
                                            // inisialisasi select2
                                            $(this.$refs.select2model).select2({
                                                tags: true,
                                                maximumSelectionLength: 1,
                                                placeholder: 'Pilih.../tambahkan',
                                                width: '100%',
                                            }).on('change', (e) => {
                                                // singkronisasi perubahan ke alpinejs
                                                this.selectedModel = $(e.target).val() ? $(e.target).val()[0] : null;
                                            });
                                            // Override event wheel untuk menandai sebagai passive
                                            this.$refs.select2model.addEventListener('wheel', (e) => {}, { passive: true });
                                        },
                                    }"
                                    >
                                        <label for="model">Model/Tipe</label>
                                        <select wire:model="form.model" x-ref="select2model" name="model" id="model" class="select2tag" for="model" data-placeholder="Pilih.../tambahkan" multiple="multiple">
                                            @foreach ($form_models as $model)
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
                                    <div wire:ignore 
                                    x-data="{
                                        selectedStatus: @entangle('form.status'),
                                        init() {
                                            // Inisialisasi Select2 menggunakan ID
                                            $(this.$refs.selectstatus).select2({
                                                width: '100%',
                                                theme: 'bootstrap4'
                                            }).on('change', (e) => {
                                                // singkronisasi perubahan ke alpinejs
                                                this.selectedStatus = $(e.target).val();
                                            });
                                        }
                                    }" x-init="init()"
                                    >
                                        <label for="status">Status *</label>
                                        <select wire:model="form.status" x-ref="selectstatus" name="status" id="status" class="form-control select2" for="status">
                                            <option name="status" id="status">Pilih...</option>
                                            @foreach ($form_statuses as $status)
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
                                    <div wire:ignore 
                                    x-data="{
                                        selectedUseraset: @entangle('form.useraset'),
                                        init() {
                                            // Inisialisasi Select2 menggunakan ID
                                            $(this.$refs.selectuseraset).select2({
                                                width: '100%',
                                                theme: 'bootstrap4'
                                            }).on('change', (e) => {
                                                // singkronisasi perubahan ke alpinejs
                                                this.selectedUseraset = $(e.target).val();
                                            });
                                        }
                                    }" x-init="init()"
                                    >
                                        <label for="useraset">User Aset</label>
                                        <select wire:model="form.useraset" x-ref="selectuseraset" name="useraset" id="useraset" class="form-control select2">
                                            <option name="useraset" id="useraset">Pilih...</option>
                                            @foreach ($form_users as $user)
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
                                    <div wire:ignore 
                                    x-data="{
                                        selectedAdminaset: @entangle('form.adminaset'),
                                        init() {
                                            // Inisialisasi Select2 menggunakan ID
                                            $(this.$refs.selectadminaset).select2({
                                                width: '100%',
                                                theme: 'bootstrap4'
                                            }).on('change', (e) => {
                                                // singkronisasi perubahan ke alpinejs
                                                this.selectedAdminaset = $(e.target).val();
                                            });
                                        }
                                    }" x-init="init()"
                                    > 
                                        <label for="adminaset">Admin Aset</label>
                                        <select wire:model="form.adminaset" x-ref="selectadminaset" name="adminaset" id="adminaset" class="form-control select2">
                                            <option name="adminaset" id="adminaset" muted>Pilih...</option>
                                            @foreach ($form_users as $user)
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
                                    <x-flatpickr wire:model="form.purchase_date" name="purchase_date" id="purchaseDateInput" placeholder="Select date" />
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
                                    <textarea wire:model="form.notes" name="notes" id="notes" class="form-control" rows="5" placeholder="Write notes here..."></textarea>
                                </div>
                                @error('form.notes')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- Submit Button -->
                <button wire:click="store" type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
</div>

@push('script')
    {{-- date-picker --}}
    <x-flatpickr::script />
    <!-- InputMask -->
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    {{-- Select2 --}}
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush