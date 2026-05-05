<?php

namespace App\Models;

use App\Enums\ReasonForEnquiry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'reason_for_enquiry',
        'description',
        'pdf_file',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'reason_for_enquiry' => ReasonForEnquiry::class,
        ];
    }

    // هذا الجزء الجديد لحذف الملف عند حذف السجل
    protected static function booted()
    {
        static::deleting(function ($contact) {
            if ($contact->pdf_file) {
                // يتأكد أن الملف موجود ثم يحذفه
                Storage::disk('public')->delete($contact->pdf_file);
            }
        });
    }
}
