<?php

namespace App\Traits;

use App\Models\DescriptionImage;
use Illuminate\Database\Eloquent\Model;

trait AttachDescriptionImage {
    
    /**
     * find images in description of given and attach it to model, then save the image.
     *
     * @return void
     */
    public static function findAndAttach(Model $model)    {
        preg_match_all('/<img.*?src=["\'](.*?)["\'].*?>/', $model->description, $matches);
        $sources = $matches[1];
        foreach($sources as $src) {
            $pathForDB = self::buildPathForDB($src);
            $model->descriptionImages()->save(DescriptionImage::make(["path"=>$pathForDB]));
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

    private static function isSourceFromOutsideURL($src) {
        return $src[1] != "storage";
    }
}