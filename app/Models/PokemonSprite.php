<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\SpriteType;

/** 
 * @property int $id
 * @property SpriteType $sprite_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class PokemonSprite extends Model
{
    protected $fillable = [
        'type',
        'url',
    ];

    protected $casts = [
        'type' => SpriteType::class,
    ];
}
