<div class="max-w-7xl mx-auto p-6 space-y-6">

    @include('livewire.tournament._workspace-header')

    <div class="flex items-center justify-between mt-6">

        <h2 class="text-2xl font-semibold">
            Team Manager
        </h2>

        <a
            href="{{ route('admin.tournaments.teams.create', $tournament) }}"
            class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            New Team
        </a>

    </div>

    <div class="overflow-hidden rounded-xl border bg-white">

        <table class="min-w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left">Team Name</th>
                    <th class="px-4 py-3 text-left">Seed</th>
                    <th class="px-4 py-3 text-left">Notes</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($entries as $entry)
                    <tr class="border-t">

                        <td class="px-4 py-3">
                            {{ $entry->team->name }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $entry->seed ?? '-' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $entry->notes ?? '-' }}
                        </td>

                        <td class="px-4 py-3 text-center">

                            <a
                                href="{{ route('admin.tournaments.teams.edit', [
                                    'tournament' => $tournament,
                                    'entry' => $entry,
                                ]) }}"
                                class="rounded border px-3 py-1 hover:bg-gray-100">
                                Edit
                            </a>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-12 text-center text-gray-500">
                            No teams have been added yet.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

        @if($entries->hasPages())
            <div class="border-t px-4 py-4">
                {{ $entries->links() }}
            </div>
        @endif

    </div>

</div>