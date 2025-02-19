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
        'created_by',
        'status',
        'published_at',
        'files',
    ];
    protected $casts = [
        'files' => 'array',
        'published_at' => 'datetime',
    ];


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
