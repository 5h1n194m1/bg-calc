<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tournament_entries', function (Blueprint $table) {
            $table->foreignId('tournament_id')
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('team_id')
                ->after('tournament_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedInteger('seed')
                ->nullable()
                ->after('team_id');

            $table->text('notes')
                ->nullable()
                ->after('seed');

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('tournament_entries', function (Blueprint $table) {
            $table->dropSoftDeletes();

            $table->dropConstrainedForeignId('team_id');
            $table->dropConstrainedForeignId('tournament_id');

            $table->dropColumn([
                'seed',
                'notes',
            ]);
        });
    }
};