<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create(
            [
                'name' => 'mayer doa vater hotel',
                'city_id' => 1,
                'longitude' => 100.23,
                'latitude' => 200.34
            ]
            );
    }
}
