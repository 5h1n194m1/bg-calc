<?php

namespace App\Services;

use App\Models\Team;
use App\Models\Tournament;
use App\Models\TournamentEntry;
use Illuminate\Support\Facades\DB;
use App\Models\Roster;

class TeamService
{
    public function getByTournament(Tournament $tournament, int $perPage = 10)
    {
        return $tournament
            ->entries()
            ->with('team')
            ->latest()
            ->paginate($perPage);
    }

    public function registerTeam(Tournament $tournament, array $data): Team
    {
        return DB::transaction(function () use ($tournament, $data) {

            $team = Team::create([
                'name' => $data['name'],
                'description' => null,
            ]);

            $entry = TournamentEntry::create([
                'tournament_id' => $tournament->id,
                'team_id' => $team->id,
                'seed' => null,
                'notes' => null,
            ]);

            foreach ($data['rosters'] as $index => $playerName) {

            if (blank($playerName)) {
                continue;
            }
                Roster::create([
                    'tournament_entry_id' => $entry->id,
                    'player_name' => $playerName,
                    'order_number' => $index + 1,
                ]);

            }

            return $team;
        });
    }

}