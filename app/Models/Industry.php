<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name', 'description'
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }
    
    public function proposals() {
        return $this->hasMany(Proposal::class);
    }
}
