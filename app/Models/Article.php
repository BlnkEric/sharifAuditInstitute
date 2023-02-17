<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

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
            self::findImagesInDescriptionAndAttach($article);
        });

        Article::deleting(function($article) {
            $article->image->delete();
            $descriptionImages = $article->descriptionImages;
            foreach($descriptionImages as $dImages) {
                $dImages->delete();
            }
        });
    }

    private static function findImagesInDescriptionAndAttach($article) {
        preg_match_all('/<img.*?src=["\'](.*?)["\'].*?>/', $article->description, $matches);
        $sources = $matches[1];
        foreach($sources as $src) {
            $pathForDB = self::buildPathForDB($src);
            $article->descriptionImages()->save(DescriptionImage::make(["path"=>$pathForDB]));
        }
    }
    private static function buildPathForDB($src) {
        $pathForDB = "";
        $srcArraySeparatedBySlash = explode("/", $src);
        if (!self::isSourceFromOutsideURL($srcArraySeparatedBySlash)) {
            $pathForDB = "public/" . $srcArraySeparatedBySlash[2] . "/" .  $srcArraySeparatedBySlash[3];
        }
        return $pathForDB;
    }

    public static function isSourceFromOutsideURL($src) {
        return $src[1] != "storage";
    }
}
