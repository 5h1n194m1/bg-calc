<div class="max-w-5xl mx-auto p-6 space-y-6">

    <div>
        <h1 class="text-2xl font-bold">Create Tournament</h1>
        <p class="text-gray-500">Create a new tournament.</p>
    </div>

    <form wire:submit="save" class="space-y-6">

        <div>
            <label class="block mb-1">Name</label>

            <input
                type="text"
                wire:model.defer="form.name"
                class="w-full border rounded px-3 py-2">

            @error('form.name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="block mb-1">Game</label>

                <select
                    wire:model.defer="form.game_id"
                    class="w-full border rounded px-3 py-2">

                    <option value="">Select Game</option>

                    @foreach($games as $game)
                        <option value="{{ $game->id }}">
                            {{ $game->name }}
                        </option>
                    @endforeach

                </select>

                @error('form.game_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1">Point System</label>

                <select
                    wire:model.defer="form.point_system_template_id"
                    class="w-full border rounded px-3 py-2">

                    <option value="">Select Template</option>

                    @foreach($pointSystemTemplates as $template)
                        <option value="{{ $template->id }}">
                            {{ $template->name }}
                        </option>
                    @endforeach

                </select>

                @error('form.point_system_template_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div>
            <label class="block mb-1">Description</label>

            <textarea
                wire:model.defer="form.description"
                rows="4"
                class="w-full border rounded px-3 py-2"></textarea>

            @error('form.description')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="block mb-1">Registration Start</label>

                <input
                    type="date"
                    wire:model.defer="form.registration_start"
                    class="w-full border rounded px-3 py-2">

                @error('form.registration_start')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1">Registration End</label>

                <input
                    type="date"
                    wire:model.defer="form.registration_end"
                    class="w-full border rounded px-3 py-2">

                @error('form.registration_end')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1">Tournament Start</label>

                <input
                    type="date"
                    wire:model.defer="form.start_date"
                    class="w-full border rounded px-3 py-2">

                @error('form.start_date')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1">Tournament End</label>

                <input
                    type="date"
                    wire:model.defer="form.end_date"
                    class="w-full border rounded px-3 py-2">

                @error('form.end_date')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="flex items-center gap-2">
            <input
                id="is_public"
                type="checkbox"
                wire:model.defer="form.is_public">

            <label for="is_public">
                Public Tournament
            </label>
        </div>

        <div class="flex justify-end gap-3">
            <a
                href="{{ route('admin.tournaments.index') }}"
                class="px-4 py-2 border rounded">
                Cancel
            </a>

            <button
                type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded">
                Create Tournament
            </button>
        </div>

    </form>

</div>