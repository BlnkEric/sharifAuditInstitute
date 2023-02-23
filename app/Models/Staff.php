<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';
    protected $fillable = ['name', 'slug', 'phone', 'email', 'role', 'industry_id', 'staff_category_id', 'description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function industry() {
        return $this->belongsTo(Industry::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function staffCategory() {
        return $this->belongsTo(StaffCategory::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($staff) {
            $staff->image->delete();
        });
    }
}
