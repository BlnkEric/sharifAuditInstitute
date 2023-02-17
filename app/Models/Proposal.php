<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug', 'company_name', 'email', 'description', 'user_id', 'industry_id', 'service_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function industry() {
        return $this->belongsTo(Industry::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
