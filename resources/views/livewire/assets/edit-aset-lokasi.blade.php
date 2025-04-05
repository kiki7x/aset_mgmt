<form wire:submit.prevent="update">
    <div class="card-body">
        <div class="row form-group">
            <div class="form-group col-md-8">
                <label for="name">Nama *</label>
                <input wire:model.defer="form.name" type="text" name="name" class="form-control" id="name" placeholder="Nama">
                @error('form.name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="client_id">Client ID *</label>
                <input wire:model.defer="form.client_id" type="text" name="client_id" class="form-control" id="client_id" placeholder="client_id">
                @error('form.color')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="d-block justify-content-end">
            <button wire:click="resetInput" type="button" class="btn btn-secondary">Reset</button>
            <a href="{{ route('admin.setting_attr.lokasi.show', ['id' => $asset->id]) }}" class="btn btn-warning">Batal</a>
            <button type="submit" class="btn btn-info">Update Lokasi</button>
        </div>
    </div>
</form>


