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
            'name'=>'Unicos de Los Valles & 2016 C.A.',
            'description'=>'Empresa de verduras y hortalizas de primera calidad.',
            'logo'=>'logo-login.png',
            'email'=>'Ejemplo@gmail.com',
            'phone_1'=>'04129379145',
            'phone_2'=>'04140296361',
            'address'=>'Calle Ppal. de Tocuyito- Local N°192- Sector Candelero- Ocumare del tuy, Edo. Miranda- Zona Postal 1209.',
            'rif'=>'J-408960079',
            'taxpayer'=>'NO',
        ]);
    }
}
