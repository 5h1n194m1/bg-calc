<div class="max-w-5xl mx-auto p-6 space-y-6">

    <div>
        <h1 class="text-2xl font-bold">
            Edit Tournament
        </h1>

        <p class="text-gray-500">
            Update tournament information.
        </p>
    </div>

    <form wire:submit="update" class="space-y-6">

        @include('livewire.tournament._form')

        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.tournaments.index') }}"
                class="px-4 py-2 border rounded">
                Cancel
            </a>

            <button
                type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded">
                Update Tournament
            </button>

        </div>

    </form>

</div>