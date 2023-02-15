<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users() {
        return $this->belongsToMany(User::class)->as('contracted')->withPivot(['contract_path']);
    }
    
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
