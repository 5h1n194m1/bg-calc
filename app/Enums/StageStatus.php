<?php

namespace App\Enums;

enum StageStatus: string
{
    case Draft = 'draft';

    case Published = 'published';

    case Running = 'running';

    case Finished = 'finished';
}