<?php declare(strict_types=1);

namespace App\Enums;

enum SpriteType: string {
    case FRONT_DEFAULT = 'front_default';
    case DEFAULT_BACK = 'back_default';
    case SHINY_FRONT = 'front_shiny';
    case SHINY_BACK = 'shiny_back';
}