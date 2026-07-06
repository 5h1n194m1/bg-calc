<div class="max-w-7xl mx-auto p-6 space-y-6">

    @include('livewire.tournament._workspace-header')

    <div class="flex items-center justify-between mt-6">

        <h2 class="text-2xl font-semibold">
            Team Manager
        </h2>

        <button
            type="button"
            class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            New Team
        </button>

    </div>

    <div class="overflow-hidden rounded-xl border bg-white">

        <table class="min-w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left">Team Name</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td colspan="3" class="px-4 py-12 text-center text-gray-500">
                        No teams have been added yet.
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>