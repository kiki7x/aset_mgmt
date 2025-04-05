<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class LocationsModel extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'client_id',
        'name',
    ];

    public function scopeSearch($query, $value)
    {
       $query->where('name', 'LIKE', "%{$value}%");
    }

}
