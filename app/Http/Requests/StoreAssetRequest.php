<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:assetcategories,id',
            'manufacturer_id' => 'required|array|min:1|max:1',
            'manufacturer_id.0' => 'required',
            'model_id' => 'required|array|min:1|max:1',
            'model_id.0' => 'required',
            'supplier_id' => 'required|array|min:1|max:1',
            'supplier_id.0' => 'required',
            'serial' => 'nullable|string|max:255',
            'location_id' => 'required|integer|exists:locations,id',
            'status_id' => 'required|integer|exists:labels,id',
            'user_id' => 'required|integer|exists:users,id',
            'purchase_date' => 'required|date',
            'warranty_months' => 'required|integer|min:0',
            'notes' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama aset wajib diisi.',
            'name.string' => 'Nama aset harus berupa teks.',
            'name.max' => 'Nama aset tidak boleh lebih dari :max karakter.',

            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.integer' => 'Kategori harus berupa angka.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',

            'manufacturer_id.required' => 'Merk/Pabrikan wajib dipilih.',
            'manufacturer_id.array' => 'Merk/Pabrikan harus berupa array.',
            'manufacturer_id.min' => 'Pilih salah satu merk/pabrikan.',
            'manufacturer_id.max' => 'Hanya boleh memilih satu merk/pabrikan.',

            'manufacturer_id.0.required' => 'Merk/Pabrikan wajib dipilih.',
            'manufacturer_id.0.exists' => 'Merk/Pabrikan yang dipilih tidak ditemukan.',

            'model_id.required' => 'Tipe/Model wajib dipilih.',
            'model_id.array' => 'Tipe/Model harus berupa array.',
            'model_id.min' => 'Pilih salah satu tipe/model.',
            'model_id.max' => 'Hanya boleh memilih satu tipe/model.',

            'model_id.0.required' => 'Tipe/Model wajib dipilih.',
            'model_id.0.exists' => 'Tipe/Model yang dipilih tidak ditemukan.',

            'supplier_id.required' => 'Supplier wajib dipilih.',
            'supplier_id.array' => 'Supplier harus berupa array.',
            'supplier_id.min' => 'Pilih salah satu supplier.',
            'supplier_id.max' => 'Hanya boleh memilih satu supplier.',

            'supplier_id.0.required' => 'Supplier wajib dipilih.',
            'supplier_id.0.exists' => 'Supplier yang dipilih tidak ditemukan.',

            'serial.string' => 'Nomor seri harus berupa teks.',
            'serial.max' => 'Nomor seri tidak boleh lebih dari :max karakter.',

            'location_id.required' => 'Penempatan wajib dipilih.',
            'location_id.integer' => 'Penempatan tidak valid.',
            'location_id.exists' => 'Penempatan yang dipilih tidak ditemukan.',

            'status_id.required' => 'Status wajib dipilih.',
            'status_id.integer' => 'Status tidak valid.',
            'status_id.exists' => 'Status yang dipilih tidak ditemukan.',

            'user_id.required' => 'Pengguna aset wajib dipilih.',
            'user_id.integer' => 'Pengguna tidak valid.',
            'user_id.exists' => 'Pengguna yang dipilih tidak ditemukan.',

            'purchase_date.required' => 'Tanggal perolehan wajib diisi.',
            'purchase_date.date' => 'Tanggal perolehan tidak valid.',

            'warranty_months.required' => 'Masa garansi wajib diisi.',
            'warranty_months.integer' => 'Masa garansi harus berupa angka.',
            'warranty_months.min' => 'Masa garansi tidak boleh kurang dari 0 bulan.',

            'notes.string' => 'Catatan harus berupa teks.',
        ];
    }
}
