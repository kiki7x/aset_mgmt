<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ModelsModel extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

}
