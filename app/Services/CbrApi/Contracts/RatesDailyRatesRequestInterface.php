<?php


namespace App\Services\CbrApi\Contracts;


use Carbon\Carbon;

interface RatesDailyRatesRequestInterface extends RatesRequestInterface
{
    public function setDate(Carbon $date);
    public function setIsoCodes(array $codes);
}
