<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leaderboard extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tournament_id',
        'stage_id',
        'entry_id',
        'played',
        'won',
        'lost',
        'draw',
        'score_for',
        'score_against',
        'points',
    ];


    public function tournament()
    {
        return $this->belongsTo(Tournament::class)
            ->withTrashed();
    }


    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }


    public function entry()
    {
        return $this->belongsTo(
            TournamentEntry::class,
            'entry_id'
        );
    }
}