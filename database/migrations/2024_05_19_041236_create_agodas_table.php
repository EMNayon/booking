<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgodasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agodas', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            $table->string('booking_reference_no')->unique();
            $table->string('client')->nullable();
            $table->string('member_id')->unique();
            $table->string('country_of_residence')->nullable();

            // $table->string('property')->nullable();
            // $table->string('address')->nullable();


            // $table->bigInteger('country_id')->nullable();
            // $table->bigInteger('state_id')->nullable();
            // $table->bigInteger('city_id')->nullable();
            $table->bigInteger('hotel_id')->nullable();
            $table->string('property_contact_number')->nullable();


            $table->string('number_of_rooms')->nullable();
            $table->string('number_of_extra_beds')->nullable();
            $table->string('number_of_adults')->nullable();
            $table->string('number_of_childern')->nullable();
            $table->string('room_type')->nullable();
            $table->string('promotion')->nullable();

            $table->string('arrival')->nullable();
            $table->string('departure')->nullable();


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
        Schema::dropIfExists('agodas');
    }
}
