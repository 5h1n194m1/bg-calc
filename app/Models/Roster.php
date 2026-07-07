<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roster extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tournament_entry_id',
        'player_name',
        'order_number',
    ];

    protected $casts = [
        'order_number' => 'integer',
    ];

    public function tournamentEntry(): BelongsTo
    {
        return $this->belongsTo(TournamentEntry::class);
    }
}