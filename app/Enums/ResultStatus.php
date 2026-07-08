<?php

namespace App\Enums;

enum ResultStatus: string
{
    case Completed = 'completed';

    case Cancelled = 'cancelled';
}