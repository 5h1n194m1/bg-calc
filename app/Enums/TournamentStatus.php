<?php

namespace App\Enums;

enum TournamentStatus: string
{
    case Draft = 'draft';
    case Registration = 'registration';
    case Ready = 'ready';
    case Running = 'running';
    case Finished = 'finished';
    case Archived = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Registration => 'Registration',
            self::Ready => 'Ready',
            self::Running => 'Running',
            self::Finished => 'Finished',
            self::Archived => 'Archived',
        };
    }
}