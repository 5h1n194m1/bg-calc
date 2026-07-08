<?php

namespace App\Models;

use App\Enums\MatchStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Result;

class GameMatch extends Model
{
    use SoftDeletes;


    protected $table = 'matches';


    protected $fillable = [
        'stage_id',
        'team_a_entry_id',
        'team_b_entry_id',
        'match_number',
        'status',
    ];


    protected $casts = [
        'status' => MatchStatus::class,
    ];


    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }


    public function teamA()
    {
        return $this->belongsTo(
            TournamentEntry::class,
            'team_a_entry_id'
        );
    }


    public function teamB()
    {
        return $this->belongsTo(
            TournamentEntry::class,
            'team_b_entry_id'
        );
    }

    public function result()
    {
        return $this->hasOne(
            Result::class,
            'match_id'
        );
    }
}