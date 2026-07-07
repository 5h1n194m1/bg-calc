<?php

namespace App\Models;

use App\Enums\StageStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}