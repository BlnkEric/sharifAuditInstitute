<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Industry extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name', 'description', 'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articles() {
        return $this->hasMany(Article::class);
    }
    
    public function proposals() {
        return $this->hasMany(Proposal::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($industry) {
            $industry->image->delete();
        });
    }
}
