<?php

namespace App\Services;

use App\Models\Stage;
use App\Models\Leaderboard;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LeaderboardService
{
    public function generateLeaderboard(Stage $stage)
    {
        return DB::transaction(function () use ($stage) {

            $this->deleteLeaderboard($stage);

            $leaderboards = [];

            $matches = $stage->matches()
                ->with('result')
                ->get();

            foreach ($matches as $match) {

                if (!$match->result) {
                    continue;
                }

                $result = $match->result;

                $teamA = $match->team_a_entry_id;
                $teamB = $match->team_b_entry_id;


                foreach ([$teamA, $teamB] as $entryId) {

                    if (!isset($leaderboards[$entryId])) {

                        $leaderboards[$entryId] = [
                            'tournament_id' => $stage->tournament_id,
                            'stage_id' => $stage->id,
                            'entry_id' => $entryId,
                            'played' => 0,
                            'won' => 0,
                            'lost' => 0,
                            'draw' => 0,
                            'score_for' => 0,
                            'score_against' => 0,
                            'points' => 0,
                        ];
                    }
                }


                $leaderboards[$teamA]['played']++;
                $leaderboards[$teamB]['played']++;


                if ($result->winner_entry_id == $teamA) {

                    $leaderboards[$teamA]['won']++;
                    $leaderboards[$teamA]['points'] += 3;

                    $leaderboards[$teamB]['lost']++;

                } elseif ($result->winner_entry_id == $teamB) {

                    $leaderboards[$teamB]['won']++;
                    $leaderboards[$teamB]['points'] += 3;

                    $leaderboards[$teamA]['lost']++;

                } else {

                    $leaderboards[$teamA]['draw']++;
                    $leaderboards[$teamB]['draw']++;

                    $leaderboards[$teamA]['points']++;
                    $leaderboards[$teamB]['points']++;
                }


                $leaderboards[$teamA]['score_for'] += $result->team_a_score;
                $leaderboards[$teamA]['score_against'] += $result->team_b_score;

                $leaderboards[$teamB]['score_for'] += $result->team_b_score;
                $leaderboards[$teamB]['score_against'] += $result->team_a_score;
            }


            foreach ($leaderboards as $data) {

                Leaderboard::create($data);

            }


            return Leaderboard::where(
                'stage_id',
                $stage->id
            )->get();

        });
    }


    public function refreshLeaderboard(Stage $stage)
    {
        return $this->generateLeaderboard($stage);
    }


    public function deleteLeaderboard(Stage $stage)
    {
        return Leaderboard::where(
            'stage_id',
            $stage->id
        )->delete();
    }
}