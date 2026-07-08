<?php

namespace App\Services;

use App\Models\GameMatch;
use App\Models\Result;
use App\Models\TournamentEntry;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ResultService
{
    public function createResult(array $data): Result
    {
        return DB::transaction(function () use ($data) {

            $match = GameMatch::findOrFail(
                $data['match_id']
            );

            $this->validateResultExists($match);

            $winner = TournamentEntry::findOrFail(
                $data['winner_entry_id']
            );

            $this->validateWinner(
                $match,
                $winner
            );

            $this->validateScore(
                $data['team_a_score'],
                $data['team_b_score']
            );


            return Result::create([
                'match_id' => $match->id,
                'winner_entry_id' => $winner->id,
                'team_a_score' => $data['team_a_score'],
                'team_b_score' => $data['team_b_score'],
                'status' => $data['status'] ?? 'completed',
            ]);
        });
    }


    public function updateResult(
        Result $result,
        array $data
    ): Result {

        return DB::transaction(function () use (
            $result,
            $data
        ) {

            $match = GameMatch::findOrFail(
                $data['match_id']
            );

            $winner = TournamentEntry::findOrFail(
                $data['winner_entry_id']
            );

            $this->validateWinner(
                $match,
                $winner
            );

            $this->validateScore(
                $data['team_a_score'],
                $data['team_b_score']
            );


            $result->update([
                'match_id' => $match->id,
                'winner_entry_id' => $winner->id,
                'team_a_score' => $data['team_a_score'],
                'team_b_score' => $data['team_b_score'],
                'status' => $data['status'],
            ]);


            return $result->fresh();
        });
    }


    public function deleteResult(Result $result): bool
    {
        return DB::transaction(function () use ($result) {

            return (bool) $result->delete();

        });
    }


    private function validateResultExists(
        GameMatch $match
    ): void {

        if ($match->result()->exists()) {

            throw ValidationException::withMessages([
                'match_id' =>
                    'Match sudah memiliki Result.'
            ]);
        }
    }


    private function validateWinner(
        GameMatch $match,
        TournamentEntry $winner
    ): void {

        $allowed = [
            $match->team_a_entry_id,
            $match->team_b_entry_id,
        ];


        if (!in_array($winner->id, $allowed)) {

            throw ValidationException::withMessages([
                'winner_entry_id' =>
                    'Winner harus salah satu peserta Match.'
            ]);
        }
    }


    private function validateScore(
        int $teamAScore,
        int $teamBScore
    ): void {

        if (
            $teamAScore < 0 ||
            $teamBScore < 0
        ) {

            throw ValidationException::withMessages([
                'score' =>
                    'Score tidak boleh negatif.'
            ]);
        }
    }
}