<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'tags'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }

    public function jobRequests() {
        return $this->hasMany(JobRequest::class);
    }

    
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }


     /**
     * Set the services
     *
     */

     public function setTagsAttribute($value)
     {
        $this->attributes['tags'] = json_encode($value);
     }



    protected static function boot() {
        parent::boot();

        static::deleting(function($jobOffer) {
            $jobOffer->image->delete();
        });
    }
}
