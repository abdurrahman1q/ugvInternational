<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'status',
        'created_by',
        'image_path',
        'images',
    ];
    protected $casts = [
        'social_links' => 'array',
        'images' => 'array',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'published_at' => 'datetime',
    ];
    public function scopePublished($query)
    {
        return $query->where('status', 'Published')
                    ->where('published_at', '<=', now());
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function getImage()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
    }
}
