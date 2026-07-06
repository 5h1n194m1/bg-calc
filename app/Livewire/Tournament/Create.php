<?php

namespace App\Livewire\Tournament;

use App\Models\Game;
use App\Models\PointSystemTemplate;
use App\Services\TournamentService;
use Livewire\Component;

class Create extends Component
{
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

    protected function rules(): array
    {
        return [
            'form.game_id' =>                   ['required', 'exists:games,id'],
            'form.point_system_template_id' =>  ['required', 'exists:point_system_templates,id'],
            'form.name' =>                      ['required', 'string', 'max:255'],
            'form.description' =>               ['nullable', 'string'],
            'form.registration_start' =>        ['nullable', 'date'],
            'form.registration_end' =>          ['nullable', 'date', 'after_or_equal:form.registration_start'],
            'form.start_date' =>                ['nullable', 'date'],
            'form.end_date' =>                  ['nullable', 'date', 'after_or_equal:form.start_date'],
            'form.is_public' =>                 ['boolean'],
        ];
    }

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