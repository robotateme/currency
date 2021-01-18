<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyDaily;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function all()
    {
        return view('home');
    }

    public function daily(CurrencyDaily $request)
    {
        $date = Carbon::createFromFormat('d-m-Y', $request->route('date'));
        return response([
            $date
        ]);
    }
}
