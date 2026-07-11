<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leaderboards', function (Blueprint $table) {
            
            $table->id();

            $table->foreignId('tournament_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('stage_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('entry_id')
                ->constrained('tournament_entries')
                ->cascadeOnDelete();

            $table->unsignedInteger('played')->default(0);
            $table->unsignedInteger('won')->default(0);
            $table->unsignedInteger('lost')->default(0);
            $table->unsignedInteger('draw')->default(0);

            $table->unsignedInteger('score_for')->default(0);
            $table->unsignedInteger('score_against')->default(0);

            $table->unsignedInteger('points')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->unique([
                'tournament_id',
                'stage_id',
                'entry_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaderboards');
    }
};
