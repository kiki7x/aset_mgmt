<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Cast\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaintenancesModel extends Model
{
    use HasFactory;
    protected $table = 'maintenances';
    protected $primaryKey = 'id';
    protected $fillable = [
        'maintenance_schedule_id', 
        'technician_id',
        'status',
        'start_date',
        'end_date',
        'attachment',
        'notes',
        'maintenance_date',
    ];
}
