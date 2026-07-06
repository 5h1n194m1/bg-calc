<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\RoundStatus;

class Round extends Model
{
    protected $casts = [
        'status' => RoundStatus::class,
    ];

    public function group()
{
    return $this->belongsTo(Group::class);
}

public function results()
{
    return $this->hasMany(RoundResult::class);
}
}
