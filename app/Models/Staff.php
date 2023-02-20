<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';
    protected $fillable = ['name', 'phone', 'email', 'role', 'service_id'];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
