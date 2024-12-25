<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsModel extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'asset_tag_prefix',
        'license_tag_prefix',
        'notes',
        'created_at',
        'updated_at'
    ];
}
