<?php

namespace App\Livewire\Tournament\Stages;

use App\Enums\StageStatus;
use App\Models\Tournament;
use App\Services\StageService;
use Livewire\Component;

class Create extends Component
{
    public Tournament $tournament;

    public array $form = [
        'name' => '',
        'description' => '',
        'order_number' => 1,
        'status' => 'draft',
    ];


    public function mount(Tournament $tournament): void
    {
        $this->tournament = $tournament;
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


    public function save(StageService $stageService)
    {
        $validated = $this->validate();

        $stageService->createStage(
            $this->tournament,
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
        return view('livewire.tournament.stages.create', [
            'statuses' => StageStatus::cases(),
        ]);
    }
}