<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'is_completed'];

    protected $casts = [
        'is_completed' => 'boolean',
    ];


}
