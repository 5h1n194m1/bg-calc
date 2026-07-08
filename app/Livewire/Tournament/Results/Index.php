<?php

namespace App\Livewire\Tournament\Results;

use App\Models\GameMatch;
use App\Models\Result;
use App\Services\ResultService;
use Livewire\Component;

class Index extends Component
{
    public GameMatch $match;


    public function mount(GameMatch $match): void
    {
        $this->match = $match;
    }


    public function delete(
        Result $result,
        ResultService $service
    )
    {
        $service->deleteResult($result);
    }


    public function render()
    {
        return view(
            'livewire.tournament.results.index',
            [
                'result' => $this->match->result,
            ]
        );
    }
}