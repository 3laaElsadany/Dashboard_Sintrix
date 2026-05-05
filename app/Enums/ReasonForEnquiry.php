<?php

namespace App\Enums;

enum ReasonForEnquiry: string
{
    case IT_SERVICE = 'IT Service';
    case CLOUD_SERVICE = 'Cloud Service';
    case CYBERSECURITY = 'Cybersecurity';
    case BUSINESS = 'Business';
    case MARKETING = 'Marketing';

    /**
     * Get all enum values as an array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get all enum names as an array
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }
}
