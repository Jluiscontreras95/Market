<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Exchange;

class ExchangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Exchange::create([
            'exchange_date'=>Carbon::now('America/Caracas'),
            'description'=>'1',
        ]);
        

    }
}
