<?php

namespace App\Http\Controllers;

use App\Models\CurrencyRate;
use Illuminate\Http\Request;

class CurrencyRateController extends Controller
{
    public function conversion($rate_country1, $rate_country2)
    {
        $rate1 = CurrencyRate::find($rate_country1);
        $rate2 = CurrencyRate::find($rate_country2);

        $rate_conversion = $rate1->value / $rate2->value;

        return $rate_conversion;
    }
}
