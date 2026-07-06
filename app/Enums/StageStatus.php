<?php

namespace App\Enums;

enum StageStatus:string
{
    case Draft='draft';
    case Waiting='waiting';
    case Running='running';
    case Finished='finished';
}