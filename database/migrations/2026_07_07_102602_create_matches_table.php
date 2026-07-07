<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('stage_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('team_a_entry_id')
                ->constrained('tournament_entries')
                ->restrictOnDelete();

            $table->foreignId('team_b_entry_id')
                ->constrained('tournament_entries')
                ->restrictOnDelete();

            $table->unsignedInteger('match_number');

            $table->string('status')
                ->default('scheduled');

            $table->timestamps();
            $table->softDeletes();

            $table->unique([
                'stage_id',
                'match_number'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
