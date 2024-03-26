<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('birth_certificate_no')->nullable();
            $table->string('certificate_no')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->string('nationality');
            $table->string('name');
            $table->string('dob');
            $table->string('gender');
            $table->string('date_of_dose_1')->nullable();
            $table->string('name_of_dose_1')->nullable();
            $table->string('date_of_dose_2')->nullable();
            $table->string('name_of_dose_2')->nullable();
            $table->string('vaccination_center')->nullable();
            $table->string('vaccinated_by')->nullable();
            $table->integer('total_dose')->nullable();
            $table->boolean('hidden')->default(1);
            $table->integer('created_by');
            $table->timestamps();
        });

        /*
         * ALTER TABLE `members` ADD `date_of_dose_3` VARCHAR(255) NULL DEFAULT NULL AFTER `hidden`, ADD `name_of_dose_3` VARCHAR(255) NULL DEFAULT NULL AFTER `date_of_dose_3`;
         * ALTER TABLE `members` ADD `hidden` TINYINT(1) NOT NULL DEFAULT '0' AFTER `updated_at`;
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
