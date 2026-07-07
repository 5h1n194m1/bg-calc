<div>

    <div class="flex justify-between mb-4">

        <h1 class="text-xl font-bold">
            Match Manager
        </h1>


        <a
            href="{{ route(
                'admin.tournaments.stages.matches.create',
                [
                    'tournament' => $stage->tournament_id,
                    'stage' => $stage
                ]
            ) }}"
            class="px-4 py-2 bg-blue-600 text-white rounded"
        >
            Create Match
        </a>

    </div>


    <table class="w-full border">

        <thead>
            <tr>
                <th class="border p-2">
                    Match
                </th>

                <th class="border p-2">
                    Team A
                </th>

                <th class="border p-2">
                    Team B
                </th>

                <th class="border p-2">
                    Status
                </th>

                <th class="border p-2">
                    Action
                </th>
            </tr>
        </thead>


        <tbody>

        @forelse($matches as $match)

            <tr>

                <td class="border p-2 text-center">
                    {{ $match->match_number }}
                </td>


                <td class="border p-2">
                    {{ $match->teamA?->id }}
                </td>


                <td class="border p-2">
                    {{ $match->teamB?->id }}
                </td>


                <td class="border p-2">
                    {{ $match->status->value }}
                </td>


                <td class="border p-2">

                    <a
                        href="{{ route(
                            'admin.tournaments.stages.matches.edit',
                            [
                                'tournament' => $stage->tournament_id,
                                'stage' => $stage,
                                'match' => $match
                            ]
                        ) }}"
                        class="text-blue-600"
                    >
                        Edit
                    </a>


                    <button
                        wire:click="delete({{ $match->id }})"
                        class="text-red-600 ml-3"
                    >
                        Delete
                    </button>

                </td>

            </tr>

        @empty

            <tr>
                <td
                    colspan="5"
                    class="text-center p-4"
                >
                    No Match
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>


</div>