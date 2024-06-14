<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $arr = [
            "Standard"     => 'Basic amenities, comfortable stay',
            "Deluxe"       => 'Enhanced comfort, upgraded amenities',
            "Superior"     => 'Extra space, premium features',
            "Suite"        => 'Separate living area, luxurious',
            "Family"       => 'Spacious, family-friendly, multiple beds',
            "Executive"    => 'Business amenities, work-friendly',
            "Junior"       => 'Compact luxury, separate sitting area',
            "Presidential" => 'Ultimate luxury, top-tier amenities',
            "Connecting"   => 'Adjoining rooms, shared door',
            "Accessible"   => 'Wheelchair accessible, special facilities'
        ];

        foreach ($arr as $key => $value) {
            RoomType::create([
                'title' => $key,
                'description' => $value,
            ]);
        }
    }
}
