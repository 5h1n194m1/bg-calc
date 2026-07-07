<?php

namespace App\Services;

use App\Models\Tournament;

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
}