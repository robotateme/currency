<?php

namespace App\Console\Commands;

use App\Events\CurrencyRatesUpdated;
use App\Models\Currency;
use App\Models\Dto\CurrencyDto;
use App\Services\CbrApi\RatesDailyRatesRequest;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use \Exception;
use Log;

class CronCbrRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:cbr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron for fetch currency rates';
    /**
     * @var RatesDailyRatesRequest
     */
    protected $cbrClient;

    /**
     * Create a new command instance.
     *
     * @param RatesDailyRatesRequest $cbrClient
     */
    public function __construct(RatesDailyRatesRequest $cbrClient)
    {
        $this->cbrClient = $cbrClient;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws Exception
     */
    public function handle()
    {
        /**
         * @var CurrencyDto[] $data
         */
        if (Currency::whereDate('created_at', '=', Carbon::now())->exists()):
            dump("Contact tomorrow!");
            return;
        endif;

        try {
            $this->cbrClient->setDate(Carbon::now())
                ->makeRequest('GET');

            $currencies = [];

            foreach ($this->cbrClient->getResult() as $row) {
                $currency = new Currency();
                $currency->fill(
                    CurrencyDto::fromCbr($row)->all()
                )
                    ->save();
                $currencies[] = $currency;
            }
            event(new CurrencyRatesUpdated($currencies));
        } catch (GuzzleException $e) {
            Log::error('CBR Cron HTTP Error:', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'source' => 'cron'
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
