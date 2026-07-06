<?php

namespace App\Enums;

enum RoundStatus:string
{
    case Waiting='waiting';
    case Running='running';
    case Finished='finished';
}