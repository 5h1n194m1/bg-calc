<div class="max-w-7xl mx-auto p-6 space-y-6">

    @include('livewire.tournament._workspace-header')

    <div class="rounded-xl border bg-white p-6">

        <h2 class="text-xl font-semibold">
            Tournament Information
        </h2>

        <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

            <div>
                <p class="text-sm text-gray-500">Name</p>
                <p class="font-medium">{{ $tournament->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Game</p>
                <p class="font-medium">{{ $tournament->game?->name ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Point System</p>
                <p class="font-medium">{{ $tournament->pointSystem?->name ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Status</p>
                <p class="font-medium">{{ $tournament->status->value }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Public</p>
                <p class="font-medium">{{ $tournament->is_public ? 'Yes' : 'No' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Registration Period</p>
                <p class="font-medium">
                    {{ $tournament->registration_start?->format('d M Y') ?? '-' }}
                    -
                    {{ $tournament->registration_end?->format('d M Y') ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Tournament Period</p>
                <p class="font-medium">
                    {{ $tournament->start_date?->format('d M Y') ?? '-' }}
                    -
                    {{ $tournament->end_date?->format('d M Y') ?? '-' }}
                </p>
            </div>

        </div>

    </div>

</div>