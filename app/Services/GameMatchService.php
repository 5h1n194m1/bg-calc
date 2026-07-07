<?php

namespace App\Services;

use App\Models\GameMatch;
use App\Models\Stage;
use App\Models\TournamentEntry;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class GameMatchService
{
    public function createMatch(array $data): GameMatch
    {
        return DB::transaction(function () use ($data) {

            $stage = Stage::findOrFail($data['stage_id']);

            $teamA = TournamentEntry::findOrFail(
                $data['team_a_entry_id']
            );

            $teamB = TournamentEntry::findOrFail(
                $data['team_b_entry_id']
            );

            $this->validateTeams(
                $teamA,
                $teamB
            );

            $this->validateMatchNumber(
                $stage,
                $data['match_number']
            );

            return GameMatch::create([
                'stage_id' => $stage->id,
                'team_a_entry_id' => $teamA->id,
                'team_b_entry_id' => $teamB->id,
                'match_number' => $data['match_number'],
                'status' => $data['status'] ?? 'scheduled',
            ]);
        });
    }


    public function updateMatch(
        GameMatch $match,
        array $data
    ): GameMatch {

        return DB::transaction(function () use ($match, $data) {

            $stage = Stage::findOrFail(
                $data['stage_id']
            );

            $teamA = TournamentEntry::findOrFail(
                $data['team_a_entry_id']
            );

            $teamB = TournamentEntry::findOrFail(
                $data['team_b_entry_id']
            );

            $this->validateTeams(
                $teamA,
                $teamB
            );

            $this->validateMatchNumber(
                $stage,
                $data['match_number'],
                $match->id
            );

            $match->update([
                'stage_id' => $stage->id,
                'team_a_entry_id' => $teamA->id,
                'team_b_entry_id' => $teamB->id,
                'match_number' => $data['match_number'],
                'status' => $data['status'],
            ]);

            return $match->fresh();
        });
    }


    public function deleteMatch(GameMatch $match): bool
    {
        return DB::transaction(function () use ($match) {

            return (bool) $match->delete();

        });
    }


    private function validateTeams(
        TournamentEntry $teamA,
        TournamentEntry $teamB
    ): void {

        if ($teamA->id === $teamB->id) {
            throw ValidationException::withMessages([
                'team_b_entry_id' =>
                    'Team A dan Team B tidak boleh sama.'
            ]);
        }


        if (
            $teamA->tournament_id !==
            $teamB->tournament_id
        ) {
            throw ValidationException::withMessages([
                'team_b_entry_id' =>
                    'Team harus berasal dari Tournament yang sama.'
            ]);
        }
    }


    private function validateMatchNumber(
        Stage $stage,
        int $matchNumber,
        ?int $ignoreId = null
    ): void {

        $exists = GameMatch::where(
                'stage_id',
                $stage->id
            )
            ->where(
                'match_number',
                $matchNumber
            )
            ->when(
                $ignoreId,
                fn ($query) =>
                $query->where('id', '!=', $ignoreId)
            )
            ->exists();


        if ($exists) {
            throw ValidationException::withMessages([
                'match_number' =>
                    'Nomor pertandingan sudah digunakan pada Stage ini.'
            ]);
        }
    }
}