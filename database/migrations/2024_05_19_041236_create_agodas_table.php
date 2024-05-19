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
            $table->unsignedBigInteger('booking_id');
            $table->string('booking_reference_no');
            $table->string('client');
            $table->integer('member_id');
            $table->string('country_of_residence');
            $table->string('property');
            $table->string('address');
            $table->string('property_contact_number');


            $table->string('number_of_rooms');
            $table->string('number_of_extra_beds');
            $table->string('number_of_adults');
            $table->string('number_of_childern');
            $table->string('room_type');
            $table->string('promotion');
            $table->string('promotion');

            $table->string('arrival');
            $table->string('departure');

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
