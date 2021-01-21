<?php

namespace App\Listeners;

use App\Events\CurrencyRatesUpdated;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param CurrencyRatesUpdated $event
     * @return void
     */
    public function handle(CurrencyRatesUpdated $event)
    {
        $currencies = collect($event->currencies)
            ->pluck('rate', 'iso_code')
            ->toJson();;
        $users = User::leftJoin('notifications', function (JoinClause $query) {
            $query->on('users.id', '=', 'notifications.user_id')
                ->whereDate('notifications.created_at', '=', Carbon::now())
                ->where('notifications.type', '=', Notification::TYPE_RATES);
        })
            ->whereNull('notifications.user_id')
            ->select('users.id')
            ->orderBy('users.id')
        ;

        foreach ($users->cursor() as $user)  {
            /** @var User $user */
            Notification::insert([
                'user_id' => $user->id,
                'message' => $currencies,
                'type' => Notification::TYPE_RATES,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
