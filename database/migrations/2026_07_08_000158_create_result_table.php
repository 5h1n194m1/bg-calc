<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {

            $table->id();

            $table->foreignId('match_id')
                ->constrained('matches')
                ->cascadeOnDelete();

            $table->foreignId('winner_entry_id')
                ->nullable()
                ->constrained('tournament_entries')
                ->restrictOnDelete();

            $table->unsignedInteger('team_a_score')
                ->default(0);

            $table->unsignedInteger('team_b_score')
                ->default(0);

            $table->string('status')
                ->default('completed');

            $table->timestamps();

            $table->softDeletes();


            $table->unique('match_id');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};