<?php

use Illuminate\Database\Seeder;
use App\Business;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'name'=>'Farmacia',
            'description'=>'Farmacéutica',
            'logo'=>'farma.png',
            'email'=>'Ejemplo@gmail.com',
            'phone_1'=>'04120000000',
            'phone_2'=>'04140000000',
            'address'=>'Caracas-Venezuela',
            'rif'=>'J-000000000',
            'taxpayer'=>'NO',
        ]);
    }
}
