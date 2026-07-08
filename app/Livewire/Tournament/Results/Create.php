<?php

namespace App\Livewire\Tournament\Results;

use App\Enums\ResultStatus;
use App\Models\GameMatch;
use App\Models\TournamentEntry;
use App\Services\ResultService;
use Livewire\Component;

class Create extends Component
{
    public GameMatch $match;


    public array $form = [
        'winner_entry_id' => '',
        'team_a_score' => 0,
        'team_b_score' => 0,
        'status' => 'completed',
    ];


    public function mount(GameMatch $match): void
    {
        $this->match = $match;
    }


    protected function rules(): array
    {
        return [
            'form.winner_entry_id' => [
                'required',
                'exists:tournament_entries,id',
            ],

            'form.team_a_score' => [
                'required',
                'integer',
                'min:0',
            ],

            'form.team_b_score' => [
                'required',
                'integer',
                'min:0',
            ],

            'form.status' => [
                'required',
                'in:completed,cancelled',
            ],
        ];
    }


    public function save(ResultService $service)
    {
        $validated = $this->validate();


        $service->createResult([
            'match_id' => $this->match->id,
            ...$validated['form'],
        ]);


        return redirect()
            ->route(
                'admin.tournaments.matches.results.index',
                $this->match
            );
    }


    public function render()
    {
        return view(
            'livewire.tournament.results.create',
            [
                'statuses' => ResultStatus::cases(),

                'entries' => [
                    $this->match->teamA,
                    $this->match->teamB,
                ],
            ]
        );
    }
}