<?php

namespace App\Livewire\Tournament\Stages;

use App\Enums\StageStatus;
use App\Models\Stage;
use App\Models\Tournament;
use App\Services\StageService;
use Livewire\Component;

class Edit extends Component
{
    public Tournament $tournament;

    public Stage $stage;

    public array $form = [];


    public function mount(
        Tournament $tournament,
        Stage $stage
    ): void {

        $this->tournament = $tournament;
        $this->stage = $stage;

        $this->form = [
            'name' => $stage->name,
            'description' => $stage->description,
            'order_number' => $stage->order_number,
            'status' => $stage->status->value,
        ];
    }


    protected function rules(): array
    {
        return [
            'form.name' => [
                'required',
                'string',
                'max:255',
            ],

            'form.description' => [
                'nullable',
            ],

            'form.order_number' => [
                'required',
                'integer',
                'min:1',
            ],

            'form.status' => [
                'required',
                'in:draft,published,running,finished',
            ],
        ];
    }


    public function update(StageService $stageService)
    {
        $validated = $this->validate();

        $stageService->updateStage(
            $this->stage,
            $validated['form']
        );


        return redirect()
            ->route(
                'admin.tournaments.stages.index',
                $this->tournament
            );
    }


    public function render()
    {
        return view('livewire.tournament.stages.edit', [
            'statuses' => StageStatus::cases(),
        ]);
    }
}