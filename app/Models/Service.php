<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

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
            self::findImagesInDescriptionAndAttach($service);
        });


        static::deleting(function($service) {
            $service->image->delete();
            $descriptionImages = $service->descriptionImages;
            foreach($descriptionImages as $dImages) {
                $dImages->delete();
            }
        });
    }

    private static function findImagesInDescriptionAndAttach($service) {
        // $imgTags = self::findImagesHTMLTag($service->description)[0];
        preg_match_all('/<img.*?src=["\'](.*?)["\'].*?>/', $service->description, $matches);
        $sources = $matches[1];
        foreach($sources as $src) {
            // $src = self::findImageSrc($imgTag);
            $pathForDB = self::buildPathForDB($src);
            $service->descriptionImages()->save(DescriptionImage::make(["path"=>$pathForDB]));
        }
    }

    /* 
    private static function findImagesHTMLTag($description) {
        $matches = [];
        preg_match_all("/(<img).*?>/", $description, $matches);
        return $matches;
    }

    private static function findImageSrc($imgTag) {
        preg_match("/src=\".*?\"/", $imgTag, $src);
        $path = substr($src[0], 5, -1);
        return $path;
    }
    */

    private static function buildPathForDB($src) {
        $pathForDB = "";
        $srcArraySeparatedBySlash = explode("/", $src);
        // if(static::isSourceFromOutsideURL($srcArraySeparatedBySlash)) {
        //     $pathForDB = $src;
        // }
        // else {
        //     $pathForDB = "public/" . $srcArraySeparatedBySlash[2] . "/" .  $srcArraySeparatedBySlash[3];
        // }
        if (!self::isSourceFromOutsideURL($srcArraySeparatedBySlash)) {
            $pathForDB = "public/" . $srcArraySeparatedBySlash[2] . "/" .  $srcArraySeparatedBySlash[3];
        }
        return $pathForDB;
    }

    public static function isSourceFromOutsideURL($src) {
        return $src[1] != "storage";
    }
}
