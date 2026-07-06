<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function stage()
{
    return $this->belongsTo(Stage::class);
}

public function entries()
{
    return $this->hasMany(TournamentEntry::class);
}

public function rounds()
{
    return $this->hasMany(Round::class);
}
}
