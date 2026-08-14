<?php

namespace App\Enums;

enum BlogContentType: string
{
    case ARTICLE = 'article';
    case LINKEDIN = 'linkedin';
    case AUTHOR = 'author';

    public function label(): string
    {
        return match ($this) {
            self::ARTICLE => 'Articles',
            self::LINKEDIN => 'LinkedIn Posts',
            self::AUTHOR => 'Author Spotlights',
        };
    }
}