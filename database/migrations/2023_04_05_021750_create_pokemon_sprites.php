<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pokemon_sprites', function (Blueprint $table) {
            $table->unsignedBigInteger('pokemon_id')->index();
            $table->string('image_url');
            $table->string('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pokemon_images');
    }
};
