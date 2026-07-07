<?php

namespace App\Livewire\Tournament\Matches;

use App\Models\Stage;
use App\Models\GameMatch;
use App\Services\GameMatchService;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;


    public Stage $stage;


    public function mount(Stage $stage): void
    {
        $this->stage = $stage;
    }


    public function delete(
        GameMatch $match,
        GameMatchService $service
    ) {
        $service->deleteMatch($match);
    }


    public function render(GameMatchService $service)
    {
        return view(
            'livewire.tournament.matches.index',
            [
                'matches' => $this->stage
                    ->matches()
                    ->latest()
                    ->paginate(10),
            ]
        );
    }
}