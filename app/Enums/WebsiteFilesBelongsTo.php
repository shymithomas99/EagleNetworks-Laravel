<?php

namespace App\Enums;

enum WebsiteFilesBelongsTo: int
{
    case SOCIALMEDIA = 1;
    case Documents = 2;
    case Webcontents = 3;
}