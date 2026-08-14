<?php

namespace App\Enums;

enum BlogContentType: string
{
    case LINKEDIN = 'linkedin';
    case ARTICLE = 'article';
    case AUTHOR = 'author';

    public function label(): string
    {
        return match ($this) {
            self::LINKEDIN => 'LinkedIn Posts',
            self::ARTICLE => 'Articles',
            self::AUTHOR => 'Author Spotlights',
        };
    }
}