<?php

namespace App\Livewire\Tournament;

use App\Livewire\Concerns\WithTournamentForm;
use App\Models\Game;
use App\Models\PointSystemTemplate;
use App\Services\TournamentService;
use Livewire\Component;

class Create extends Component
{
    use WithTournamentForm;

    public array $form = [
        'game_id' => '',
        'point_system_template_id' => '',
        'name' => '',
        'description' => '',
        'registration_start' => '',
        'registration_end' => '',
        'start_date' => '',
        'end_date' => '',
        'is_public' => true,
    ];

    public function render()
    {
        return view('livewire.tournament.create', [
            'games' => Game::orderBy('name')->get(),
            'pointSystemTemplates' => PointSystemTemplate::orderBy('name')->get(),
        ]);
    }

    public function save(TournamentService $tournamentService): mixed
    {
        $validated = $this->validate();

        $tournamentService->create($validated['form']);

        return redirect()->route('admin.tournaments.index');
    }
}