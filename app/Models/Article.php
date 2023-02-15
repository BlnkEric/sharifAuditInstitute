<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "industry_id", "service_id"];

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
        // static::addGlobalScope(new DeletedAdminScope);
        parent::boot();
    }
}
