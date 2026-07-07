<?php

namespace App\Livewire\Tournament\Teams;

use App\Models\Tournament;
use App\Services\TeamService;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public Tournament $tournament;

    public function mount(Tournament $tournament): void
    {
        $this->tournament = $tournament;
    }

    public function render(TeamService $teamService)
    {
        return view('livewire.tournament.teams.index', [
            'entries' => $teamService->getByTournament($this->tournament),
        ]);
    }
}