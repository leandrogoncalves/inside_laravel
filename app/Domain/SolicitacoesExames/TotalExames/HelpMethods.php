<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames;

use Carbon\Carbon;

trait HelpMethods
{
    protected function getDateFormatted(Carbon $date)
    {
        return $date->toDateTimeString();
    }
}
