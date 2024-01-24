<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status'
    ];
    protected $casts = [
        'status' => 'integer'
    ];

    const NEW_TASK = 1;
    const PAUSE_TASK = 2;
    const CLOSED_TASK = 3;
}
