<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public static function getAllowedPhoneNumbers(): array
    {
        $data = self::where('key', 'allowed_phone_numbers')
            ->first()?->value ?? '';

        return explode("\n", $data);
    }
}
