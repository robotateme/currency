<?php

namespace App\Console\Commands;

use App\Events\CurrencyRatesUpdated;
use App\Jobs\TestJob;
use App\Listeners\NotifyUsers;
use Illuminate\Console\Command;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

//        event(new CurrencyRatesUpdated(10.3));
    }
}
