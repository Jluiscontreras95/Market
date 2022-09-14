<?php

use Illuminate\Database\Seeder;
use App\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Provider::create([
            'name'          =>'Sin Proveedor',
            'email'         =>'SP@gmail.com',
            'rif_number'    =>'000000000',
            'account_bank'  =>'00000000000000000',
            'address'       =>'xxxxxxxxxxxxxxxxxx',
            'phone'         =>'000000000000000000',
        ]);
    }
}
