<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->string('confirmation_number');
            $table->string('pin_code');

            $table->string('hotel_name');
            $table->string('address');
            $table->string('phone');
            $table->string('gps_coordinates');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('rooms');
            $table->string('nights');
            $table->string('price');
            $table->string('tax');
            $table->string('deluxe_room');
            $table->string('guest_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
