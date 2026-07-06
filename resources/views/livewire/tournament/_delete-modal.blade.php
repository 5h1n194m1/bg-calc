@if($confirmingDelete)
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-xl">

        <h2 class="text-lg font-semibold">
            Delete Tournament
        </h2>

        <p class="mt-2 text-sm text-gray-500">
            Are you sure you want to delete
            <span class="font-medium text-gray-900">
                {{ $tournamentToDelete?->name }}
            </span>?
            This action cannot be undone.
        </p>

        <div class="mt-6 flex justify-end gap-3">

            <button
                type="button"
                wire:click="$set('confirmingDelete', false)"
                class="rounded border px-4 py-2">
                Cancel
            </button>

            <button
                type="button"
                wire:click="delete"
                class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700">
                Delete
            </button>

        </div>

    </div>

</div>
@endif