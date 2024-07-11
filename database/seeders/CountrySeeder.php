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
            'country_code' => '+880',
            'currency_prefix' => 'BDT',
            'currency_icon' => '৳'
        ]);
        Country::create([
            'name' => 'Pakistan',
            'country_code' => '+92',
            'currency_prefix' => 'PKR',
            'currency_icon' => '₨'
        ]);
        Country::create([
            'name' => 'India',
            'country_code' => '+91',
            'currency_prefix' => 'INR',
            'currency_icon' => '₹'
        ]);
    }
}
