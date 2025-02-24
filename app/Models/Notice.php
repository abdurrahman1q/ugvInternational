<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notice extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'type',
        'status',
        'published_at',
        'files',
    ];
    protected $casts = [
        'files' => 'array',
        'published_at' => 'datetime',
    ];



}
