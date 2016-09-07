<?php

use Illuminate\Database\Seeder;
use conference\Sector;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Sector::create([
         'name' => 'Creer',
         'price' => 550,
         'stock' => 450,
         'price_before' => 750,
         'state_promotion' => 'disabled',
         'type_sale' => 'preventa',
         'state' => 'enable'
     ]);
     Sector::create([
        'name' => 'Crear',
        'price' => 750,
        'stock' => 100,
        'price_before' => 900,
        'state_promotion' => 'enable',
        'type_sale' => 'preventa',
        'state' => 'enable'
    ]);
    Sector::create([
       'name' => 'Crecer',
       'price' => 900,
       'stock' => 100,
       'price_before' => 1100,
       'state_promotion' => 'disabled',
       'type_sale' => 'preventa',
       'state' => 'enable'
   ]);
    }
}
