<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        Game::insert([
            [
                'name' => 'PUBG Mobile',
                'slug' => 'pubg-mobile',
                'is_active' => true,
            ],
            [
                'name' => 'Free Fire',
                'slug' => 'free-fire',
                'is_active' => true,
            ],
            [
                'name' => 'Blood Strike',
                'slug' => 'blood-strike',
                'is_active' => true,
            ],
            [
                'name' => 'CODM Battle Royale',
                'slug' => 'codm-br',
                'is_active' => true,
            ],
            [
                'name' => 'Arena Breakout',
                'slug' => 'arena-breakout',
                'is_active' => true,
            ],
        ]);
    }
}