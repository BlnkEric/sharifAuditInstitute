<?php

namespace App\Models;

use App\Traits\AttachDescriptionImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    use AttachDescriptionImage;

    protected $fillable = ['name', 'description', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users() {
        return $this->belongsToMany(User::class)->as('contracted')->withPivot(['contract_path']);
    }
    
    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function descriptionImages() {
        return $this->morphMany(DescriptionImage::class, 'dimageable');
    }

    protected static function boot() {
        parent::boot();

        Service::created(function($service) {
            AttachDescriptionImage::findAndAttach($service);
        });


        static::deleting(function($service) {
            $service->image->delete();
            $descriptionImages = $service->descriptionImages;
            foreach($descriptionImages as $dImages) {
                $dImages->delete();
            }
        });
    }
}
