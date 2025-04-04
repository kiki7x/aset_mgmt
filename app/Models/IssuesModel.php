<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssuesModel extends Model
{
    use HasFactory;
    protected $table = 'issues';
    protected $primaryKey = 'id';
    protected $fillable = [
        'client_id',
        'asset_id',
        'ticketreply_id',
        'admin_id',
        'milestone_id',
        'project_id',
        'issuetype',
        'priority',
        'status',
        'name',
        'description',
        'duedate',
        'timespent',
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'LIKE', "%{$value}%")
        ->orWhere('description', 'LIKE', "%{$value}%");
    }

    public function pro(): BelongsTo
    {
        return $this->belongsTo(AssetclassificationsModel::class);
    }
}
