<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hotel_address')->nullable();
            $table->string('hotel_mobile_number')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('google_map_add')->nullable();
            $table->string('hotel_tax')->nullable();
            $table->string('google_map_image')->nullable();
            $table->string('hotel_image')->nullable();
            $table->string('google_map_image')->nullable();
            $table->foreignId('city_id')->constrained('cities', 'id');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('hotels');
    }
}
