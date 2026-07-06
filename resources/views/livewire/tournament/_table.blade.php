<div class="overflow-hidden rounded-xl border bg-white">

    <table class="min-w-full">

        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3 text-left">Tournament</th>
                <th class="px-4 py-3 text-left">Game</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Public</th>
                <th class="px-4 py-3 text-center">Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($tournaments as $tournament)

                <tr class="border-t">

                    <td class="px-4 py-3">
                        <a
                            href="{{ route('admin.tournaments.edit', $tournament) }}"
                            class="text-indigo-600 hover:underline">
                            {{ $tournament->name }}
                        </a>
                    </td>

                    <td class="px-4 py-3">
                        {{ $tournament->game?->name }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $tournament->status->value }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $tournament->is_public ? 'Yes' : 'No' }}
                    </td>

                    <td class="px-4 py-3 text-center">

                        <a
                            href="{{ route('admin.tournaments.edit', $tournament) }}"
                            class="text-indigo-600 hover:underline">
                            Edit
                        </a>

                        <span class="mx-2 text-gray-300">|</span>

                        <button
                            type="button"
                            wire:click="confirmDelete({{ $tournament->id }})"
                            class="text-red-600 hover:underline">
                            Delete
                        </button>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="px-4 py-10 text-center text-gray-500">
                        No tournaments found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-6">
    {{ $tournaments->links() }}
</div>