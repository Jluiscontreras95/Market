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
            'name'=>'Nombre de la empresa.',
            'description'=>'Descripción corta de la empresa.',
            'logo'=>'logo.png',
            'email'=>'Ejemplo@gmail.com',
            'address'=>'8888 Cummings Vista Apt. 101, Susanbury, NY 95473',
            'rif'=>'V152478956',
            'taxpayer'=>'NO',
        ]);
    }
}
