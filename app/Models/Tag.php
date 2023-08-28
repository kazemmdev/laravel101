<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name'        => 'string',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
