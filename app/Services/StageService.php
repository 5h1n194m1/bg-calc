<?php

namespace App\Services;

use App\Enums\StageStatus;
use App\Models\Stage;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;

class StageService
{
    public function getByTournament(Tournament $tournament, int $perPage = 10)
    {
        return $tournament
            ->stages()
            ->latest('order_number')
            ->paginate($perPage);
    }

    public function createStage(Tournament $tournament, array $data): Stage
    {
        return DB::transaction(function () use ($tournament, $data) {

            return Stage::create([
                'tournament_id' => $tournament->id,
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
                'order_number' => $data['order_number'],
                'status' => $data['status'] ?? StageStatus::Draft,
            ]);
        });
    }


    public function updateStage(Stage $stage, array $data): Stage
    {
        return DB::transaction(function () use ($stage, $data) {

            $stage->update([
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
                'order_number' => $data['order_number'],
                'status' => $data['status'],
            ]);

            return $stage->fresh();
        });
    }


    public function deleteStage(Stage $stage): bool
    {
        return DB::transaction(function () use ($stage) {

            return $stage->delete();
        });
    }
}