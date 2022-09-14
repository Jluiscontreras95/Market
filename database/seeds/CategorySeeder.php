<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name'=>'Frutería',
            'description'=>'Todo lo relacionado con frutas en general',
        ]);
    }
}
