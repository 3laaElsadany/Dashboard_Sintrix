<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class ReportDocument extends Model
{
    protected $fillable = [
        'document_name',
        'document_type',
        'file_path',
        'file_size',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (auth()->check()) {
                $model->user_id = auth()->id();
            }
        });
    }

    protected static function booted()
    {
        // عند الحذف
        static::deleting(function ($service) {
            if ($service->file_path) {
                Storage::disk('public')->delete($service->file_path);
            }
        });

    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
