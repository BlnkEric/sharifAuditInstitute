<?php

namespace App\Services;

use App\Models\DescriptionImage;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorImageUploadService {
    public function create(Request $request) {
        if($request->has("upload")) {
            $imageFile = $request->file("upload");
            $extension = $imageFile->guessClientExtension();
            $imagePath = $imageFile->storeAs("public/service_images", "description_" . sha1(time()) . "." . $extension);
            $url = Storage::url($imagePath);
            return json_encode([
                'default' => $url,
                '500' => $url
            ]);
        }
    }

    public function update(Request $request, Model $model) {
        if($request->has("upload")) {
            $imageFile = $request->file("upload");
            $extension = $imageFile->guessClientExtension();
            $imagePath = $imageFile->storeAs("public/service_images", "description_" . sha1(time()) . "." . $extension);
            $model->descriptionImages()->save(DescriptionImage::make(["path"=>$imagePath]));
            $url = Storage::url($imagePath);
            return json_encode([
                'default' => $url,
                '500' => $url
            ]);
        }
    }

    public function delete(Request $request) {
        $descriptionImage = DescriptionImage::findOrFail($request->id);
        $descriptionImage->descriptionImageable()->dissociate();
        $descriptionImage->delete();
    }
}