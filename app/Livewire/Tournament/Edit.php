<?php

namespace App\Livewire\Tournament;

use App\Livewire\Concerns\WithTournamentForm;
use App\Models\Game;
use App\Models\PointSystemTemplate;
use App\Models\Tournament;
use App\Services\TournamentService;
use Livewire\Component;

class Edit extends Component
{
    use WithTournamentForm;

    public Tournament $tournament;

    public array $form = [];

    public function mount(Tournament $tournament): void
    {
        $this->tournament = $tournament;

        $this->form = [
            'game_id' => $tournament->game_id,
            'point_system_template_id' => $tournament->point_system_template_id,
            'name' => $tournament->name,
            'description' => $tournament->description,
            'registration_start' => $tournament->registration_start?->format('Y-m-d'),
            'registration_end' => $tournament->registration_end?->format('Y-m-d'),
            'start_date' => $tournament->start_date?->format('Y-m-d'),
            'end_date' => $tournament->end_date?->format('Y-m-d'),
            'is_public' => $tournament->is_public,
        ];
    }

    public function render()
    {
        return view('livewire.tournament.edit', [
            'games' => Game::orderBy('name')->get(),
            'pointSystemTemplates' => PointSystemTemplate::orderBy('name')->get(),
        ]);
    }

    public function update(TournamentService $tournamentService): mixed
    {
        $validated = $this->validate();

        $tournamentService->update(
            $this->tournament,
            $validated['form']
        );

        return redirect()->route('admin.tournaments.index');
    }
}