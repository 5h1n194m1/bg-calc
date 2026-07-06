<?php

namespace App\Livewire\Tournament;

use App\Models\Tournament;
use Livewire\Component;

class Workspace extends Component
{
    public Tournament $tournament;

    public function mount(Tournament $tournament): void
    {
        $this->tournament = $tournament->load([
            'game',
            'pointSystem',
        ]);
    }

    public function render()
    {
        return view('livewire.tournament.workspace');
    }
}