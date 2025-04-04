<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesModel extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'client_id',
        'asset_id',
        'ticketreply_id',
        'name',
        'file',
    ];
}
