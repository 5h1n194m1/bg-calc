<?php

namespace App\Livewire\Tournament\Teams;

use App\Models\Tournament;
use App\Models\TournamentEntry;
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

    public function delete(
        TournamentEntry $entry,
        TeamService $teamService
    ): void {

        $teamService->deleteTeam($entry);

        session()->flash(
            'success',
            'Team deleted successfully.'
        );
    }

    public function render(TeamService $teamService)
    {
        return view('livewire.tournament.teams.index', [
            'entries' => $teamService->getByTournament($this->tournament),
        ]);
    }
}