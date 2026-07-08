<?php

namespace App\Models;

use App\Enums\ResultStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'match_id',
        'winner_entry_id',
        'team_a_score',
        'team_b_score',
        'status',
    ];


    protected $casts = [
        'status' => ResultStatus::class,
    ];


    public function match()
    {
        return $this->belongsTo(
            GameMatch::class,
            'match_id'
        );
    }


    public function winner()
    {
        return $this->belongsTo(
            TournamentEntry::class,
            'winner_entry_id'
        );
    }
}