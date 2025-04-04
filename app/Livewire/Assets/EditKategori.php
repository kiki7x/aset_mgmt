<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Livewire\Forms\KategoriForm;
use Illuminate\Validation\Rule;
use App\Models\AssetcategoriesModel;
use App\Models\AssetclassificationsModel;

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Livewire\Forms\KategoriForm;
use App\Models\AssetcategoriesModel;
use App\Models\AssetclassificationsModel;

class EditKategori extends Component
{
    public KategoriForm $form;
    public $kategoriId;

    protected $listeners = ['setClassification'];

    public function setClassification($data)
    {
        $this->form->classification_id = $data['value'];
    }


    public function mount($id)
    {
        $this->kategoriId = $id;
        $this->form->load($id);
    }

    public function update()
    {
        $this->validate();

        $kategori = AssetcategoriesModel::findOrFail($this->kategoriId);
        $kategori->update([
            'name' => $this->form->name,
            'color' => $this->form->color,
            'classification_id' => $this->form->classification_id,
        ]);

        session()->flash('success', 'Kategori berhasil diperbarui!');
        return redirect()->route('admin.setting_attr.kategori');
    }

    public function render()
    {
        $asset = AssetcategoriesModel::findOrFail($this->kategoriId);

        return view('livewire.assets.edit-aset-kategori', [
            'classifications' => AssetclassificationsModel::all(),
            'asset' => $asset,
        ]);
    }
}


    // public function render()
    // {
    //     return view('livewire.assets.edit-aset-kategori', [
    //         'classifications' => $this->classifications,
    //         'asset' => $this->asset
    //     ]);
    // }

