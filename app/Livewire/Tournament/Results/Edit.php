<?php

namespace App\Livewire\Tournament\Results;

use App\Enums\ResultStatus;
use App\Models\Result;
use App\Models\GameMatch;
use App\Services\ResultService;
use Livewire\Component;

class Edit extends Component
{
    public GameMatch $match;

    public Result $result;


    public array $form = [];


    public function mount(
        GameMatch $match,
        Result $result
    ): void {

        $this->match = $match;
        $this->result = $result;


        $this->form = [
            'winner_entry_id' => $result->winner_entry_id,
            'team_a_score' => $result->team_a_score,
            'team_b_score' => $result->team_b_score,
            'status' => $result->status->value,
        ];
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


    public function update(ResultService $service)
    {
        $validated = $this->validate();


        $service->updateResult(
            $this->result,
            [
                'match_id' => $this->match->id,
                ...$validated['form'],
            ]
        );


        return redirect()
            ->route(
                'admin.tournaments.matches.results.index',
                $this->match
            );
    }


    public function render()
    {
        return view(
            'livewire.tournament.results.edit',
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