<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DescriptionImage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'path',
    ];

    public function descriptionImageable() {
        return $this->morphTo('dimageable');
    }

    public function url() {
        return Storage::url($this->path);
    }

    protected static function boot()
    {
        parent::boot();
        DescriptionImage::deleting(function($image) {
            Storage::delete($image->path);
        });
    }
}
