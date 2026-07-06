<?php

namespace App\Livewire\Tournament;

use App\Services\TournamentService;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tournament;

class Index extends Component
{
    use WithPagination;

    public function render(TournamentService $service)
    {
        return view('livewire.tournament.index', [
            'tournaments' => $service->getAll(),
        ]);
    }

    public function confirmDelete(Tournament $tournament): void
    {
        $this->tournamentToDelete = $tournament;
        $this->confirmingDelete = true;
    }

    public function delete(TournamentService $service): void
    {
        if ($this->tournamentToDelete) {
            $service->delete($this->tournamentToDelete);
    }

    $this->confirmingDelete = false;
    $this->tournamentToDelete = null;
    }

    public bool $confirmingDelete = false;

    public ?Tournament $tournamentToDelete = null;
}