<div>

<h1 class="text-xl font-bold mb-4">
Edit Match
</h1>


<form wire:submit="update">


<div class="mb-3">

<label>
Team A
</label>


<select
wire:model="form.team_a_entry_id"
class="border w-full"
>

@foreach($entries as $entry)

<option value="{{ $entry->id }}">
Entry #{{ $entry->id }}
</option>

@endforeach

</select>

</div>



<div class="mb-3">

<label>
Team B
</label>


<select
wire:model="form.team_b_entry_id"
class="border w-full"
>

@foreach($entries as $entry)

<option value="{{ $entry->id }}">
Entry #{{ $entry->id }}
</option>

@endforeach

</select>

</div>



<div class="mb-3">

<label>
Match Number
</label>


<input
type="number"
wire:model="form.match_number"
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
class="bg-green-600 text-white px-4 py-2 rounded"
>
Update
</button>


</form>


</div>