<?php

namespace App\Models;

use App\Enums\TournamentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'game_id',
        'point_system_template_id',
        'name',
        'slug',
        'description',
        'banner',
        'registration_start',
        'registration_end',
        'start_date',
        'end_date',
        'is_public',
        'status',
    ];

    protected $casts = [
        'registration_start' => 'date',
        'registration_end' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_public' => 'boolean',
        'status' => TournamentStatus::class,
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function pointSystem(): BelongsTo
    {
        return $this->belongsTo(PointSystemTemplate::class, 'point_system_template_id');
    }

    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class);
    }

    public function entries(): HasMany
    {
        return $this->hasMany(TournamentEntry::class);
    }
    public function leaderboards()
    {
        return $this->hasMany(Leaderboard::class);
    }
}