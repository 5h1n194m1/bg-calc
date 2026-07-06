<div class="max-w-7xl mx-auto p-6 space-y-6">

    <div class="flex items-center justify-between">

        <div>
            <a
                href="{{ route('admin.tournaments.index') }}"
                class="inline-flex items-center text-sm text-indigo-600 hover:underline">
                ← Back to Tournaments
            </a>

            <h1 class="mt-2 text-3xl font-bold">
                {{ $tournament->name }}
            </h1>

            <p class="text-gray-500">
                Tournament Workspace
            </p>
        </div>

        <a
            href="{{ route('admin.tournaments.edit', $tournament) }}"
            class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            Edit Tournament
        </a>

    </div>

    <div class="border-b">
        <nav class="flex gap-6">

            <a
                href="#"
                class="border-b-2 border-indigo-600 pb-3 font-medium text-indigo-600">
                Overview
            </a>

            <a
                href="#"
                class="pb-3 text-gray-600 hover:text-indigo-600">
                Teams
            </a>

            <a
                href="#"
                class="pb-3 text-gray-600 hover:text-indigo-600">
                Stages
            </a>

            <a
                href="#"
                class="pb-3 text-gray-600 hover:text-indigo-600">
                Matches
            </a>

            <a
                href="#"
                class="pb-3 text-gray-600 hover:text-indigo-600">
                Leaderboard
            </a>

        </nav>
    </div>

    <div class="rounded-xl border bg-white p-6">
        <h2 class="text-xl font-semibold">
            Overview
        </h2>

        <p class="mt-2 text-gray-500">
            Tournament Workspace Foundation
        </p>
    </div>

</div>