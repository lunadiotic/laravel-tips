<?php

namespace App\Enums;

enum TaskState: string
{
    case Draft = 'draft';
    case Upcoming = 'upcoming';
    case Done = 'done';
}
