<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PointSystemTemplate extends Model
{
    protected $fillable = [
        'game_id',
        'name',
        'settings',
        'is_default',
    ];

    protected $casts = [
        'settings' => 'array',
        'is_default' => 'boolean',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function tournamentPointSystems(): HasMany
    {
        return $this->hasMany(TournamentPointSystem::class);
    }
}