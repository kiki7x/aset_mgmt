<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AssetclassificationsModel extends Model
{
    use HasFactory;
    protected $table = 'assetclassifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    public function assetcategories()
    {
        return $this->hasMany(AssetcategoriesModel::class, 'classification_id', 'id');
    }

    public function assets()
    {
        return $this->hasMany(AssetsModel::class);
    }

     // fungsi search
     public function scopeSearch($query, $value)
     {
        $query->where('name', 'LIKE', "%{$value}%");
     }

}
