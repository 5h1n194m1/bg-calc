<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\PointSystemTemplate;
use Illuminate\Database\Seeder;

class PointSystemTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $game = Game::where('slug', 'free-fire')->first();

        PointSystemTemplate::create([
            'game_id' => $game->id,
            'name' => 'Free Fire Official',
            'settings' => [
                'kill' => 1,
                'placement' => [
                    1 => 12,
                    2 => 9,
                    3 => 8,
                    4 => 7,
                    5 => 6,
                    6 => 5,
                    7 => 4,
                    8 => 3,
                    9 => 2,
                    10 => 1,
                ],
            ],
            'is_default' => true,
        ]);
    }
}