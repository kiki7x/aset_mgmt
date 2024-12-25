<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Assetcategories extends Model
{
    use HasFactory;
    protected $table = 'assetcategories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'color',
        'created_at',
        'updated_at',
    ];

}
