<?php

namespace App\Presenters;

use Carbon\Carbon;

class DateTimeFormatPresenter
{
    public function formatDate(Carbon $date)
    {
        return $date->toDateTimeString();
    }
}