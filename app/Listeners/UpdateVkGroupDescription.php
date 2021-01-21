<?php

namespace App\Listeners;

use App\Events\CurrencyRatesUpdated;
use App\Services\VKApi\Client;
use GuzzleHttp\Exception\GuzzleException;

class UpdateVkGroupDescription
{
    /**
     * Handle the event.
     *
     * @param CurrencyRatesUpdated $event
     * @return void
     * @throws GuzzleException
     */
    public function handle(CurrencyRatesUpdated $event)
    {
        $currencies = collect($event->currencies)->whereIn('iso_code',['EUR', 'USD'],true);
        $str = '';
        $i = 0;
        foreach ($currencies as $k => $currency) {
            $i++;
            $str .= "$currency->iso_code [$currency->rate]" . PHP_EOL;
            if($currencies->count() == $i) {
                $str .= $currency->date;
            }
        }
        $vkClient = new Client();
        $vkClient->groups()->edit([
            'group_id' => 0,
            'description' => $str
        ]);
    }
}
