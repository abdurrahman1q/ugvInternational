<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

protected function casts(){
    return [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
        'published_at' => 'datetime:Y-m-d',
        
    ];
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
