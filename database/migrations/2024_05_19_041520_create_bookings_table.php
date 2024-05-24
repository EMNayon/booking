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

            $table->string('confirmation_number')->nullable();
            $table->string('pin_code')->nullable();

            $table->string('hotel_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('gps_coordinates')->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('rooms')->nullable();
            $table->string('nights')->nullable();
            $table->string('price')->nullable();
            $table->string('tax')->nullable();
            $table->string('deluxe_room')->nullable();
            $table->string('guest_name')->nullable();

            $table->string('extra-1')->nullable();
            $table->string('extra-2')->nullable();
            $table->string('extra-3')->nullable();
            $table->string('extra-4')->nullable();
            $table->string('extra-5')->nullable();
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
