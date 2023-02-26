<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'industry_id', 'services'];

    public function industry(){
        return $this->belongsTo(Industry::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class)->as('contracted')->withPivot(['service_name'])->withTimestamps();;
    }
    
    // داستان موفقیت مشتریان
    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }


     /**
     * Set the services
     *
     */

     public function setServicesAttribute($value)
     {
        $this->attributes['services'] = json_encode($value);
     }



    protected static function boot() {
        parent::boot();

        static::deleting(function($client) {
            $client->image->delete();
        });
    }
}
