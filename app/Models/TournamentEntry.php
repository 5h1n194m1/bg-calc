<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Result;

class TournamentEntry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tournament_id',
        'team_id',
        'seed',
        'notes',
    ];

    protected $casts = [
        'seed' => 'integer',
    ];

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function rosters(): HasMany
    {
        return $this->hasMany(Roster::class);
    }

    public function wonResults()
    {
        return $this->hasMany(
            Result::class,
            'winner_entry_id'
        );
    }
}