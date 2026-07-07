<?php

namespace App\Livewire\Tournament\Stages;

use App\Models\Stage;
use App\Models\Tournament;
use App\Services\StageService;
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


    public function delete(Stage $stage, StageService $stageService)
    {
        $stageService->deleteStage($stage);
    }


    public function render(StageService $stageService)
    {
        return view('livewire.tournament.stages.index', [
            'stages' => $stageService
                ->getByTournament($this->tournament),
        ]);
    }
}