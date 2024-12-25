<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients_adminsModel extends Model
{
    use HasFactory;
    protected $table = 'clients_admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'admin_id',
        'client_id',
        'created_at',
        'updated_at'
    ];
}
