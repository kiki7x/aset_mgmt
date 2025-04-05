<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ManufacturersModel extends Model
{
    use HasFactory;
    protected $table = 'manufacturers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    public function scopeSearch($query, $value)
    {
       $query->where('name', 'LIKE', "%{$value}%");
    }
}
