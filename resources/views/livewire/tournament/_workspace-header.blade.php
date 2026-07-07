<div class="space-y-6">

    <div class="flex items-center justify-between">

        <div>
            <a
                href="{{ route('admin.tournaments.index') }}"
                class="text-sm text-indigo-600 hover:underline">
                ← Back to Tournaments
            </a>

            <h1 class="mt-2 text-3xl font-bold">
                {{ $tournament->name }}
            </h1>

            <p class="text-gray-500">
                {{ $tournament->game?->name }}
            </p>
        </div>

        <a
            href="{{ route('admin.tournaments.edit', $tournament) }}"
            class="rounded-lg border px-4 py-2 hover:bg-gray-100">
            Edit Tournament
        </a>

    </div>

    <div class="border-b">
        <nav class="flex gap-6">

            <a
                href="{{ route('admin.tournaments.workspace', $tournament) }}"
                class="pb-3 hover:text-indigo-600">
                Overview
            </a>

            <a
                href="{{ route('admin.tournaments.teams.index', $tournament) }}"
                class="pb-3 hover:text-indigo-600">
                Teams
            </a>

            <a
                href="{{ route('admin.tournaments.stages.index', $tournament) }}"
                class="pb-3 text-gray-600 hover:text-indigo-600">
                Stages
            </a>

            <a
                href="#"
                class="pb-3 text-gray-400 cursor-not-allowed">
                Matches
            </a>

            <a
                href="#"
                class="pb-3 text-gray-400 cursor-not-allowed">
                Leaderboard
            </a>

        </nav>
    </div>

</div>