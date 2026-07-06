<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('point_system_templates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('game_id')->
                constrained('games')
                ->cascadeOnDelete();

            $table->string('name');

            $table->json('settings');

            $table->boolean('is_default')->
                default(false);

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_system_templates');
    }
};
