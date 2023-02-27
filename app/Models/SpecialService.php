<?php

namespace App\Models;

use App\Traits\AttachDescriptionImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecialService extends Model
{
    use HasFactory;
    use AttachDescriptionImage;

    protected $fillable = ['name', 'slug', 'description', 'service_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function descriptionImages() {
        return $this->morphMany(DescriptionImage::class, 'dimageable');
    }

    protected static function boot() {
        parent::boot();

        SpecialService::created(function($specialService) {
            AttachDescriptionImage::findAndAttach($specialService);
        });

        static::deleting(function($specialService) {
            $specialService->image->delete();
            $descriptionImages = $specialService->descriptionImages;
            foreach($descriptionImages as $dImages) {
                $dImages->delete();
            }
        });
    }
}
