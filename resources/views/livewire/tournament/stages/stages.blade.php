<div class="max-w-5xl mx-auto p-6 space-y-6">

    @include('livewire.tournament._workspace-header')


    <div>

        <h2 class="text-2xl font-semibold">
            Create Stage
        </h2>

        <p class="text-gray-500">
            Add a new tournament stage.
        </p>

    </div>


    <form wire:submit="save" class="space-y-6">


        <div>

            <label class="block mb-2">
                Stage Name
            </label>


            <input
                type="text"
                wire:model.defer="form.name"
                class="w-full rounded-lg border px-4 py-2">


            @error('form.name')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>



        <div>

            <label class="block mb-2">
                Description
            </label>


            <textarea
                wire:model.defer="form.description"
                class="w-full rounded-lg border px-4 py-2"></textarea>


            @error('form.description')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>



        <div>

            <label class="block mb-2">
                Order Number
            </label>


            <input
                type="number"
                wire:model.defer="form.order_number"
                class="w-full rounded-lg border px-4 py-2">


            @error('form.order_number')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>



        <div>

            <label class="block mb-2">
                Status
            </label>


            <select
                wire:model.defer="form.status"
                class="w-full rounded-lg border px-4 py-2">


                @foreach($statuses as $status)

                    <option value="{{ $status->value }}">
                        {{ ucfirst($status->value) }}
                    </option>

                @endforeach


            </select>


            @error('form.status')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror


        </div>



        <div class="flex justify-end gap-3">


            <a
                href="{{ route('admin.tournaments.stages.index', $tournament) }}"
                class="rounded-lg border px-4 py-2">

                Cancel

            </a>



            <button
                type="submit"
                class="rounded-lg bg-indigo-600 px-4 py-2 text-white">

                Save Stage

            </button>


        </div>


    </form>


</div>