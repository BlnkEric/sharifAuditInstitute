<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'approved_client',
        'phone',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function proposals(){
        return $this->hasMany(Proposal::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class)->as('contracted')->withPivot(['contract_path']);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopeMostActiveUsers(Builder $query) {
        return $query->withCount('proposals')->orderBy('proposal_count', 'DESC');
    }

    // public function scopeAdminUsers(Builder $query) {
    //         return $query->where('is_admin', true);
    // }

}
