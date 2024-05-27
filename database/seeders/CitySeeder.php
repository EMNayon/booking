<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'Rupnagar',
            'state_id' => 1
        ]);

        City::create([
            'name' => 'New Postu Town',
            'state_id' => 2
        ]);

        City::create([
            'name' => 'hariana',
            'state_id' => 3
        ]);
    }
}
