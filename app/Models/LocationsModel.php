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
        'id',
        'client_id',
        'name',
        'created_at',
        'updated_at'
    ];

}
