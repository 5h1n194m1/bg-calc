<?php

namespace App\Livewire\Tournament\Teams;

use App\Models\Tournament;
use Livewire\Component;

class Index extends Component
{
    public Tournament $tournament;

    public function mount(Tournament $tournament): void
    {
        $this->tournament = $tournament;
    }

    public function render()
    {
        return view('livewire.tournament.teams.index');
    }
}