<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function entries()
{
    return $this->hasMany(TournamentEntry::class);
}
}
