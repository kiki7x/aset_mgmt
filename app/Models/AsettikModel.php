<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsettikModel extends Model
{
    use HasFactory;

    protected $table = 'assets';
    protected $fillable = [
        'category',
        'admin',
        'client',
        'user',
        'manufacturer',
        'model',
        'supplier',
        'status',
        'purchase_date',
        'warranty_months',
        'tag',
        'name',
        'serial',
        'notes',
        'location',
        'customfields',
        'qrvalue',
        'created_at',
        'updated_at',
    ];

    // relasi ke model assetcategories
    public function category(): BelongsTo
    {
        return $this->belongsTo(AssetcategoriesModel::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(ManufacturersModel::class);
    }

    public function model()
    {
        return $this->belongsTo(ModelsModel::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset('storage/asettik/' . $image),
        );
    }
}
