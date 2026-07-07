<?php

namespace App\Livewire\Tournament\Matches;

use App\Enums\MatchStatus;
use App\Models\GameMatch;
use App\Models\Stage;
use App\Models\TournamentEntry;
use App\Services\GameMatchService;
use Livewire\Component;

class Edit extends Component
{
    public Stage $stage;

    public GameMatch $match;


    public array $form = [];


    public function mount(
        Stage $stage,
        GameMatch $match
    ): void {

        $this->stage = $stage;
        $this->match = $match;


        $this->form = [
            'team_a_entry_id' => $match->team_a_entry_id,
            'team_b_entry_id' => $match->team_b_entry_id,
            'match_number' => $match->match_number,
            'status' => $match->status->value,
        ];
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


    public function update(GameMatchService $service)
    {
        $validated = $this->validate();


        $service->updateMatch(
            $this->match,
            [
                'stage_id' => $this->stage->id,
                ...$validated['form'],
            ]
        );


        return redirect()
            ->route(
                'admin.tournaments.stages.matches.index',
                $this->stage
            );
    }


    public function render()
    {
        return view(
            'livewire.tournament.matches.edit',
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