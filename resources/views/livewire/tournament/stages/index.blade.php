<div class="max-w-7xl mx-auto p-6 space-y-6">

    @include('livewire.tournament._workspace-header')

    <div class="flex items-center justify-between mt-6">

        <h2 class="text-2xl font-semibold">
            Stage Manager
        </h2>

        <button
            type="button"
            disabled
            class="rounded-lg bg-gray-300 px-4 py-2 text-white cursor-not-allowed">
            New Stage
        </button>

    </div>

    <div class="overflow-hidden rounded-xl border bg-white">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-4 py-3 text-left">
                        Stage Name
                    </th>

                    <th class="px-4 py-3 text-left">
                        Status
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
                            {{ $stage->status->value }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="2" class="px-4 py-12 text-center text-gray-500">
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