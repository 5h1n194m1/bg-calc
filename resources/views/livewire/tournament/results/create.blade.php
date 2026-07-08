<div>

<h1 class="text-xl font-bold mb-4">
Create Result
</h1>


<form wire:submit="save">


<div class="mb-3">

<label>
Winner
</label>


<select
wire:model="form.winner_entry_id"
class="border w-full"
>

<option value="">
Select Winner
</option>


@foreach($entries as $entry)

<option value="{{ $entry->id }}">
Entry #{{ $entry->id }}
</option>

@endforeach


</select>


@error('form.winner_entry_id')

<span class="text-red-500">
{{ $message }}
</span>

@enderror

</div>



<div class="mb-3">

<label>
Team A Score
</label>


<input
type="number"
wire:model="form.team_a_score"
class="border w-full"
/>


</div>



<div class="mb-3">

<label>
Team B Score
</label>


<input
type="number"
wire:model="form.team_b_score"
class="border w-full"
/>


</div>



<div class="mb-3">

<label>
Status
</label>


<select
wire:model="form.status"
class="border w-full"
>

@foreach($statuses as $status)

<option value="{{ $status->value }}">
{{ ucfirst($status->value) }}
</option>

@endforeach


</select>

</div>



<button
type="submit"
class="bg-blue-600 text-white px-4 py-2 rounded"
>
Save
</button>


</form>

</div>