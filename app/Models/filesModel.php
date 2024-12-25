<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filesModel extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'client_id',
        'asset_id',
        'ticketreply_id',
        'name',
        'file',
        'created_at',
        'updated_at'
    ];
}
