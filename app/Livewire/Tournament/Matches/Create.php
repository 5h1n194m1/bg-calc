<?php

namespace App\Livewire\Tournament\Matches;

use App\Enums\MatchStatus;
use App\Models\Stage;
use App\Models\TournamentEntry;
use App\Services\GameMatchService;
use Livewire\Component;

class Create extends Component
{
    public Stage $stage;


    public array $form = [
        'team_a_entry_id' => '',
        'team_b_entry_id' => '',
        'match_number' => 1,
        'status' => 'scheduled',
    ];


    public function mount(Stage $stage): void
    {
        $this->stage = $stage;

        $this->form['stage_id'] = $stage->id;
    }


    protected function rules(): array
    {
        return [
            'form.team_a_entry_id' => [
                'required',
                'exists:tournament_entries,id',
            ],

            'form.team_b_entry_id' => [
                'required',
                'exists:tournament_entries,id',
                'different:form.team_a_entry_id',
            ],

            'form.match_number' => [
                'required',
                'integer',
                'min:1',
            ],

            'form.status' => [
                'required',
                'in:scheduled,ongoing,finished,cancelled',
            ],
        ];
    }


    public function save(GameMatchService $service)
    {
        $validated = $this->validate();


        $service->createMatch([
            'stage_id' => $this->stage->id,
            ...$validated['form'],
        ]);


        return redirect()
            ->route(
                'admin.tournaments.stages.matches.index',
                $this->stage
            );
    }


    public function render()
    {
        return view(
            'livewire.tournament.matches.create',
            [
                'statuses' => MatchStatus::cases(),

                'entries' => TournamentEntry::where(
                    'tournament_id',
                    $this->stage->tournament_id
                )->get(),
            ]
        );
    }
}