<?php

namespace App\Listeners;

use App\Events\CurrencyRatesUpdated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers implements ShouldQueue
{
    use InteractsWithQueue;

    public $delay = 60;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CurrencyRatesUpdated $event
     * @return void
     */
    public function handle(CurrencyRatesUpdated $event)
    {
        $users = User::whereAvatar('avatar.jpg')
            ->limit(50)
            ->get()
        ;

        foreach ($users as $user) {
            $user->update([
                'avatar' => $user->avatar.$event->rateValue
            ]);
        }
        sleep(15);
    }
}
