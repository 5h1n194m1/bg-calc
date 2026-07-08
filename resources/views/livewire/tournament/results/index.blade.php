<div>

    <div class="flex justify-between mb-4">

        <h1 class="text-xl font-bold">
            Result Manager
        </h1>


        @if(!$result)

        <a
            href="{{ route(
                'admin.tournaments.matches.results.create',
                $match
            ) }}"
            class="px-4 py-2 bg-blue-600 text-white rounded"
        >
            Create Result
        </a>

        @endif

    </div>


    @if($result)

    <table class="w-full border">

        <thead>
            <tr>

                <th class="border p-2">
                    Winner
                </th>

                <th class="border p-2">
                    Score
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

            <tr>

                <td class="border p-2">
                    Entry #{{ $result->winner_entry_id }}
                </td>


                <td class="border p-2">
                    {{ $result->team_a_score }}
                    -
                    {{ $result->team_b_score }}
                </td>


                <td class="border p-2">
                    {{ $result->status->value }}
                </td>


                <td class="border p-2">

                    <a
                        href="{{ route(
                            'admin.tournaments.matches.results.edit',
                            [
                                'match' => $match,
                                'result' => $result
                            ]
                        ) }}"
                        class="text-blue-600"
                    >
                        Edit
                    </a>


                    <button
                        wire:click="delete({{ $result->id }})"
                        class="text-red-600 ml-3"
                    >
                        Delete
                    </button>

                </td>

            </tr>

        </tbody>


    </table>


    @else

        <div class="p-4 text-center">
            No Result
        </div>

    @endif


</div>