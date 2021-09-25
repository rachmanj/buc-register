<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonIncharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'project_code',
        'active',
        'remarks',
        'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
