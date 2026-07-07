<?php

namespace App\Services;

use App\Models\Tournament;

class StageService
{
    public function getByTournament(Tournament $tournament, int $perPage = 10)
    {
        return $tournament
            ->stages()
            ->latest('order_number')
            ->paginate($perPage);
    }
}