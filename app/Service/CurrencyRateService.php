<?php

namespace App\Service;

use App\Models\CurrencyRate;
use Illuminate\Support\Facades\Http;

class CurrencyRateService
{
    public function callApi()
    {
        $xmlCurrencyRate = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp');

        $jsonCurrencyRate = json_encode($xmlCurrencyRate);

        $arrayCurrencyRate = json_decode($jsonCurrencyRate, TRUE);

        $values  = $arrayCurrencyRate['Valute'];

        foreach($values as $value)
            {
                CurrencyRate::create([
                 'num_code' => $value['NumCode'],
                 'char_code' => $value['CharCode'],
                 'nominal' => $value['Nominal'],
                 'name' => $value['Name'],
                 'value' => str_replace(',', '.', $value['Value']),
                ]);
            }

    }


}
