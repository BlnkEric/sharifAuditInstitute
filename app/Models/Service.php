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
        preg_match_all('/<img.*?src=["\'](.*?)["\'].*?>/', $service->description, $matches);
        $sources = $matches[1];
        foreach($sources as $src) {
            $pathForDB = self::buildPathForDB($src);
            $service->descriptionImages()->save(DescriptionImage::make(["path"=>$pathForDB]));
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
