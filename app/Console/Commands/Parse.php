<?php

namespace App\Console\Commands;

use App\Http\Controllers\CurrencyRateController;
use App\Service\CurrencyRateService;
use Illuminate\Console\Command;

class Parse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cb:parser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to start parsing currency rate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new CurrencyRateService())->callApi();
    }
}
