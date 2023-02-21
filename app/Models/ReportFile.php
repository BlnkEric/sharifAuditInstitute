<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class ReportFile extends Model
{
    use HasFactory;

    protected $fillable = ["path", "extension"];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    
    public function url()
    {
        return Storage::url($this->path);
    }

    public static function boot()
    {
        parent::boot();

        ReportFile::deleting(function ($reportFile) {
            $filePath = $reportFile->path;
            Storage::delete($filePath);
        });
    }
}
