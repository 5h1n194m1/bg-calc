<?php

namespace App\Livewire\Tournament;

use App\Services\TournamentService;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render(TournamentService $service)
    {
        return view('livewire.tournament.index', [
            'tournaments' => $service->getAll(),
        ]);
    }
}