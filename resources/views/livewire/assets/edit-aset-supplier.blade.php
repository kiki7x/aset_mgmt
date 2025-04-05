<form wire:submit.prevent="update">
    <div class="card-body">
        <div class="row form-group">
            <div class="form-group col-md-4">
                <label for="name">Nama *</label>
                <input wire:model.defer="form.name" type="text" name="name" class="form-control" id="name" placeholder="Nama">
                @error('form.name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-8">
                <label for="address">Alamat *</label>
                <input wire:model.defer="form.address" type="text" name="address" class="form-control" id="address" placeholder="address">
                @error('form.address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="contactname">Nama Contact *</label>
                <input wire:model.defer="form.contactname" type="text" name="contactname" class="form-control" id="contactname" placeholder="contactname">
                @error('form.contactname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="phone">Phone *</label>
                <input wire:model.defer="form.phone" type="text" name="phone" class="form-control" id="phone" placeholder="phone">
                @error('form.phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email *</label>
                <input wire:model.defer="form.email" type="email" name="email" class="form-control" id="email" placeholder="email">
                @error('form.email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="notes">Notes *</label>
                <input wire:model.defer="form.notes" type="text" name="notes" class="form-control" id="notes" placeholder="notes">
                @error('form.notes')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="d-block justify-content-end">
            <button wire:click="resetInput" type="button" class="btn btn-secondary">Reset</button>
            <a href="{{ route('admin.setting_attr.supplier.show', ['id' => $asset->id]) }}" class="btn btn-warning">Batal</a>
            <button type="submit" class="btn btn-info">Update Supplier</button>
        </div>
    </div>
</form>


