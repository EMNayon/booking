<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'Bangladesh',
        ]);
        Country::create([
            'name' => 'Pakistan'
        ]);
        Country::create([
            'name' => 'India'
        ]);
    }
}