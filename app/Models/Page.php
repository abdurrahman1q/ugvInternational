<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'blocks',
    ];

    protected $casts = [
        'blocks' => 'array',
    ];
    public function setBlocksAttribute($value)
    {
        $this->attributes['blocks'] = is_array($value) ? json_encode($value) : $value;
    }
    public function getBlocksAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }
}
