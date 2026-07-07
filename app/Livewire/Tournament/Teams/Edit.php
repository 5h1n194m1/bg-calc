<?php

namespace App\Livewire\Tournament\Teams;

use App\Models\Tournament;
use App\Models\TournamentEntry;
use App\Services\TeamService;
use Livewire\Component;

class Edit extends Component
{
    public Tournament $tournament;

    public TournamentEntry $entry;

    public array $form = [
        'name' => '',
        'rosters' => [
            '',
        ],
    ];

    protected function rules(): array
    {
        return [
            'form.name' => ['required', 'string', 'max:255'],
            'form.rosters' => ['required', 'array', 'min:1'],
            'form.rosters.*' => ['required', 'string', 'max:255'],
        ];
    }

    public function mount(
        Tournament $tournament,
        TournamentEntry $entry
    ): void {

        $this->tournament = $tournament;
        $this->entry = $entry->load('team', 'rosters');

        $this->form = [
            'name' => $this->entry->team->name,
            'rosters' => $this->entry->rosters
                ->sortBy('order_number')
                ->pluck('player_name')
                ->values()
                ->toArray(),
        ];
    }

    public function addRoster(): void
    {
        $this->form['rosters'][] = '';
    }

    public function removeRoster(int $index): void
    {
        if (count($this->form['rosters']) <= 1) {
            return;
        }

        unset($this->form['rosters'][$index]);

        $this->form['rosters'] = array_values(
            $this->form['rosters']
        );
    }

    public function update(TeamService $teamService): mixed
    {
        $validated = $this->validate();

        $teamService->updateTeam(
            $this->entry,
            $validated['form']
        );

        return redirect()->route(
            'admin.tournaments.teams.index',
            $this->tournament
        );
    }

    public function render()
    {
        return view('livewire.tournament.teams.edit');
    }
}