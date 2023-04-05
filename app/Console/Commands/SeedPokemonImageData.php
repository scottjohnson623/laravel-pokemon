<?php

namespace App\Console\Commands;

use App\Models\Pokemon;
use App\Enums\SpriteType;
use App\Models\PokemonSprite;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;

class SeedPokemonImageData extends Command
{
    protected $signature = 'app:seed-pokemon-image-data';
    protected $description = 'Command description';

    public function handle(): void
    {
        Pokemon::chunk(500, function (Collection $chunk) {
            $chunk->each(function (Pokemon $pokemon) {
                $url = sprintf('https://pokeapi.co/api/v2/pokemon/%s/', $pokemon->name);
                $response = Http::get($url)->json();
                $sprites = $response['sprites'];
                collect(SpriteType::cases())->each(function (SpriteType $sprite_type) use ($sprites, $pokemon) {
                    if ($sprites[$sprite_type->value]) {
                        PokemonSprite::firstOrCreate(['pokemon_id' => $pokemon->id, 'type' => $sprite_type->value], ['url' => $sprites[$sprite_type->value]]);
                    }
                });
        });
    });

    $this->info('done!');
    }
}
