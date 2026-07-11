<?php

namespace App\Models;

use App\Enums\StageStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\GameMatch;

class Stage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tournament_id',
        'name',
        'description',
        'order_number',
        'status',
    ];

    protected $casts = [
        'status' => StageStatus::class,
    ];

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function matches(): HasMany
    {
        return $this->hasMany(GameMatch::class);
    }

    public function leaderboards()
    {
        return $this->hasMany(Leaderboard::class);
    }
}