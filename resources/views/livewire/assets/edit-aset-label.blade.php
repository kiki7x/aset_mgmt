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
                <label for="color">Color *</label>
                <input wire:model.defer="form.color" type="text" name="color" class="form-control" id="color" placeholder="color">
                @error('form.color')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="d-block justify-content-end">
            <button wire:click="resetInput" type="button" class="btn btn-secondary">Reset</button>
            <a href="{{ route('admin.setting_attr.label.show', ['id' => $asset->id]) }}" class="btn btn-warning">Batal</a>
            <button type="submit" class="btn btn-info">Update Label</button>
        </div>
    </div>
</form>


