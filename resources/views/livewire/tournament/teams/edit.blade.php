<div class="max-w-5xl mx-auto p-6 space-y-6">

    @include('livewire.tournament._workspace-header')

    <div>
        <h2 class="text-2xl font-semibold">
            Edit Team
        </h2>

        <p class="text-gray-500">
            Update team information and roster.
        </p>
    </div>

    <form wire:submit="update" class="space-y-8">

        <div>

            <label class="block mb-2">
                Team Name
            </label>

            <input
                type="text"
                wire:model.defer="form.name"
                class="w-full rounded-lg border px-4 py-2">

            @error('form.name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror

        </div>

        <div class="space-y-4">

            <div class="flex items-center justify-between">

                <h3 class="text-lg font-semibold">
                    Roster
                </h3>

                <button
                    type="button"
                    wire:click="addRoster"
                    class="rounded-lg border px-3 py-2 hover:bg-gray-100">
                    + Add Player
                </button>

            </div>

            @foreach($form['rosters'] as $index => $player)

                <div class="flex gap-3">

                    <input
                        type="text"
                        wire:model.defer="form.rosters.{{ $index }}"
                        placeholder="Player {{ $index + 1 }}"
                        class="flex-1 rounded-lg border px-4 py-2">

                    <button
                        type="button"
                        wire:click="removeRoster({{ $index }})"
                        class="rounded-lg border px-4 hover:bg-red-50">
                        Remove
                    </button>

                </div>

                @error('form.rosters.' . $index)
                    <p class="text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            @endforeach

        </div>

        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.tournaments.teams.index', $tournament) }}"
                class="rounded-lg border px-4 py-2">
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                Update Team
            </button>

        </div>

    </form>

</div>