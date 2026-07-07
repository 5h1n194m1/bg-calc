<?php

namespace App\Services;

use App\Models\Roster;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\TournamentEntry;
use Illuminate\Support\Facades\DB;

class TeamService
{
    public function getByTournament(Tournament $tournament, int $perPage = 10)
    {
        return $tournament
            ->entries()
            ->with([
                'team',
                'rosters',
            ])
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

    public function updateTeam(TournamentEntry $entry, array $data): Team
    {
        return DB::transaction(function () use ($entry, $data) {

            $entry->team->update([
                'name' => $data['name'],
            ]);

            $entry->rosters()->forceDelete();

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

            return $entry->team->fresh();
        });
    }

    protected function canDelete(TournamentEntry $entry): bool
    {
        // PATCH-018
        // Belum ada Stage / Match / Score / Leaderboard.
        // Seluruh team masih boleh dihapus.

        return true;
    }

    public function deleteTeam(TournamentEntry $entry): void
    {
        DB::transaction(function () use ($entry) {

            if (! $this->canDelete($entry)) {
                abort(403, 'Team cannot be deleted because it has already been used.');
            }

            $entry->rosters()->delete();

            $entry->delete();

            $entry->team->delete();
        });
    }
}