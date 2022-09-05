<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Exchange;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Exchange::create([
            'description'=>'1',
            'exchange_date'=>Carbon::now('America/Caracas'),
        ]);

    }
}
