<?php

namespace App\Enums;

enum SocialMedia: string
{
    case LINKEDIN = 'linkedin';
    case X = 'x';
    case INSTAGRAM = 'instagram';
    case TIKTOK = 'tiktok';
    case YOUTUBE = 'youtube';

    public function label(): string
    {
        return match ($this) {
            self::LINKEDIN => 'LinkedIn',
            self::X => 'X (formerly Twitter)',
            self::INSTAGRAM => 'Instagram',
            self::TIKTOK => 'TikTok',
            self::YOUTUBE => 'YouTube',
        };
    }
}
