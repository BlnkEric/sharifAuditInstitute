<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'priority'];

    public function staffs() {
        return $this->hasMany(Staff::class);
    }
}
