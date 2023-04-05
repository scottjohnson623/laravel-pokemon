<?php

namespace App\Console\Commands;

use App\Models\Pokemon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SeedPokemonData extends Command
{
    protected $signature = 'app:seed-pokemon-data';
    protected $description = 'Command description';

    public function handle(): void
    {
        $url = 'https://pokeapi.co/api/v2/pokemon';
        while ($url) {
            $response = Http::get($url)->json();
            collect($response['results'])->each(function ($item) {
                Pokemon::firstOrCreate(['name' => $item['name']]);
            });

            $url = $response['next'];
        }
    }
}
