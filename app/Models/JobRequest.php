<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    use HasFactory;

    protected $fillable = ['uuid','file_path', 'job_offer_id'];

    public function jobOffer() {
        return $this->belongsTo(JobOffer::class);
    }

}
