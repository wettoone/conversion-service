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

        $rounded_rate_conversion = round($rate_conversion, 4);

        echo 'Курс валюты ' . $rate1->name . ' к ' . $rate2->name . ' : ' . $rounded_rate_conversion;
    }


    public function getExchangeRates($id)
    {
        $baseCurrency = CurrencyRate::findOrFail($id);
        $exchangeRates = CurrencyRate::where('id', '!=', $id)->get();
        $response = [];

        foreach ($exchangeRates as $currency) {
            $rate = $baseCurrency->value / $baseCurrency->nominal * $currency->nominal / $currency->value;
            $response[] = [
                'value' => round($rate, 4)
            ];
        }
        return response()->json($response);
    }
}
