<?php

namespace App\Models;

use App\Traits\AttachDescriptionImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use AttachDescriptionImage;

    protected $fillable = ["name", "slug", "description", "industry_id", "service_id"];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function industry() {
        return $this->belongsTo(Industry::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }


    public function scopeLatest(Builder $query) {
        return $query->orderBy(static::CREATED_AT, 'DESC');
    }

    public function descriptionImages() {
        return $this->morphMany(DescriptionImage::class, 'dimageable');
    }

    public static function boot(){
        parent::boot();

        Article::created(function($article) {
            AttachDescriptionImage::findAndAttach($article);
        });

        Article::deleting(function($article) {
            $article->image->delete();
            $descriptionImages = $article->descriptionImages;
            foreach($descriptionImages as $dImages) {
                $dImages->delete();
            }
        });
    }
}
