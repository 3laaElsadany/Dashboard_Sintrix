<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HandlesImage
{
    protected static function bootHandlesImage()
    {
        // عند الحذف
        static::deleting(function ($model) {
            if ($model->img_link) {
                Storage::disk('public')->delete($model->img_link);
            }
        });

        // عند التحديث
        static::updating(function ($model) {
            if ($model->isDirty('img_link')) {
                $oldImage = $model->getOriginal('img_link');

                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}