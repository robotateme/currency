<?php

namespace App\Events;

use App\Models\Currency;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CurrencyRatesUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Currency[]
     */
    public $currencies;

    /**
     * Create a new event instance.
     *
     * @param Currency[] $currencies
     */
    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }
}
