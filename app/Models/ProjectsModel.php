<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsModel extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'client_id',
        'tag',
        'name',
        'notes',
        'description',
        'startdate',
        'deadline',
        'progress',
    ];

    // public function scopeSearch($query, $value)
    // {
    //     $query->where('name', 'LIKE', "%{$value}%")
    //     ->orWhere('description', 'LIKE', "%{$value}%");
    // }
}
