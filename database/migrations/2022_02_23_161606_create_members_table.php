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

            $table->string('bin_no')->nullable();
            $table->string('mushak')->nullable();
            $table->string('issuing_office')->nullable();
            $table->string('money_receipt_no')->nullable();
            $table->string('class_of_insurance')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->string('drawn_on')->nullable();

            $table->string('policy_no')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('plan_type')->nullable();
            $table->string('area_of_travel')->nullable();
            $table->string('no_of_days_covered')->nullable();
            $table->string('premium')->nullable();
            $table->string('total_premium')->nullable();
            $table->string('mr_no')->nullable();


            $table->string('name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->string('dob')->nullable();
            $table->string('pass_no')->nullable();
            $table->string('nationality')->nullable();

            $table->string('code')->nullable();

            $table->string('extra_1')->nullable();
            $table->string('extra_2')->nullable();
            $table->string('extra_3')->nullable();
            $table->string('extra_4')->nullable();
            $table->string('extra_5')->nullable();

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
