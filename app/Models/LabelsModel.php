<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class LabelsModel extends Model
{
    use HasFactory;
    protected $table = 'labels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'color',
    ];

    public function scopeSearch($query, $value)
    {
       $query->where('name', 'LIKE', "%{$value}%");
    }

}
