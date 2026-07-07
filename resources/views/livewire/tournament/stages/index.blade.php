<div class="max-w-7xl mx-auto p-6 space-y-6">
    @include('livewire.tournament._workspace-header')

    <div class="flex items-center justify-between mt-6">
        <div>
            <h2 class="text-2xl font-semibold">
                Stage Manager
            </h2>
            <p class="text-gray-500">
                Manage tournament stages.
            </p>
        </div>

        <a
            href="{{ route('admin.tournaments.stages.create', $tournament) }}"
            class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            New Stage
        </a>

    </div>


    <div class="overflow-hidden rounded-xl border bg-white">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-4 py-3 text-left">
                        Stage Name
                    </th>

                    <th class="px-4 py-3 text-left">
                        Order
                    </th>

                    <th class="px-4 py-3 text-left">
                        Status
                    </th>

                    <th class="px-4 py-3 text-center">
                        Action
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($stages as $stage)

                    <tr class="border-t">

                        <td class="px-4 py-3">
                            {{ $stage->name }}
                        </td>


                        <td class="px-4 py-3">
                            {{ $stage->order_number }}
                        </td>


                        <td class="px-4 py-3">

                            {{ ucfirst($stage->status->value) }}

                        </td>


                        <td class="px-4 py-3 text-center space-x-2">


                            <a
                                href="{{ route('admin.tournaments.stages.edit', [
                                    'tournament' => $tournament,
                                    'stage' => $stage,
                                ]) }}"
                                class="rounded border px-3 py-1 hover:bg-gray-100">

                                Edit

                            </a>


                            <button
                                wire:click="delete({{ $stage->id }})"
                                onclick="return confirm('Delete this stage?')"
                                class="rounded border px-3 py-1 text-red-600 hover:bg-red-50">

                                Delete

                            </button>


                        </td>

                    </tr>


                @empty

                    <tr>

                        <td
                            colspan="4"
                            class="px-4 py-12 text-center text-gray-500">

                            No stages have been created yet.

                        </td>

                    </tr>

                @endforelse


            </tbody>


        </table>


        @if($stages->hasPages())

            <div class="border-t px-4 py-4">

                {{ $stages->links() }}

            </div>

        @endif


    </div>


</div>