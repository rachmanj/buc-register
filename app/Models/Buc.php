<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buc extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nomor',
        'activity_name',
        'project_code',
        'person_incharge_id',
        'start_date',
        'budget',
        'duration',
        'status',
        'remarks',
        'created_by',
    ];

    public function pincharge()
    {
        return $this->belongsTo(PersonIncharge::class, 'person_incharge_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
