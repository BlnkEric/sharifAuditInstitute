<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company_name', 'email', 'description', 'file_path', 'user_id', 'industry_id', 'service_id'];

    public function industry() {
        return $this->belongsTo(Industry::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
