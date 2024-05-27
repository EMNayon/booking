<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'name' => 'Dhaka',
            'country_id' => 1
        ]);

        State::create([
            'name' => 'Islamabad',
            'country_id' => 2
        ]);

        State::create([
            'name' => 'Delhi',
            'country_id' => 3
        ]);

    }
}
