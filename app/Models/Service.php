<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'title1',
        'description1',
        'title2',
        'description2',
        'technical',
        'key_services',
        'how_we_work',
        'benefits',
        'technologies',
        'img_url'
    ];

    protected static function booted()
    {
        // عند الحذف
        static::deleting(function ($service) {
            if ($service->img_url) {
                Storage::disk('cloudinary')->delete($service->img_url);
            }
        });

        // عند التعديل (لو تم تغيير الصورة)
        static::updating(function ($service) {
            if ($service->isDirty('img_url')) {
                $oldImage = $service->getOriginal('img_url');

                if ($oldImage) {
                    Storage::disk('cloudinary')->delete($oldImage);
                }
            }
        });
    }

    protected $casts = [
        'technical' => 'array',
        'key_services' => 'array',
        'how_we_work' => 'array',
        'benefits' => 'array',
        'technologies' => 'array',
    ];
}
