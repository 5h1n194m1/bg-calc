<div class="p-6">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold">
                Tournament
            </h1>

            <p class="text-gray-500">
                Manage all tournaments.
            </p>
        </div>

        <a
            href="{{ route('admin.tournaments.create') }}"
            class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 transition">
            New Tournament
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border bg-white">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-4 py-3 text-left">Tournament</th>
                    <th class="px-4 py-3 text-left">Game</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Public</th>

                </tr>

            </thead>

            <tbody>

                @forelse($tournaments as $tournament)

                    <tr class="border-t">

                        <td class="px-4 py-3">
                            {{ $tournament->name }}
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-10 text-center text-gray-500">
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
</div>