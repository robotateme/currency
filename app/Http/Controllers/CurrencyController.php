<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyDaily;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function all()
    {
        return CurrencyResource::collection(
            Currency::query()
                ->whereIn('iso_code', ['USD', 'EUR'])
                ->paginate()
        );
    }

    public function daily(CurrencyDaily $request)
    {
        $date = Carbon::createFromFormat('d-m-Y', $request->route('date'));

        return CurrencyResource::collection(
            Currency::whereDate('date', '=', $date)->get()
        );
    }
}
