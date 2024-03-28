<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('insurance_infos', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('bin')->nullable();
        //     $table->string('mushak')->nullable();
        //     $table->string('issuing_office')->nullable();
        //     $table->string('money_receipt_no')->nullable();
        //     $table->string('class_of_insurance')->nullable();
        //     $table->string('mode_of_payment')->nullable();
        //     $table->string('drawn_on')->nullable();

        //     $table->string('policy_no');
        //     $table->string('issue_date');
        //     $table->string('plan_type')->nullable();
        //     $table->string('area_of_travel')->nullable();
        //     $table->string('no_of_days_covered')->nullable();
        //     $table->string('premium')->nullable();
        //     $table->string('total_premium')->nullable();
        //     $table->string('mr_no')->nullable();


        //     $table->string('name')->nullable();
        //     $table->string('mobile_no')->nullable();
        //     $table->string('address')->nullable();
        //     $table->string('age')->nullable();
        //     $table->string('dob')->nullable();
        //     $table->string('pass_no')->nullable();
        //     $table->string('nationality')->nullable();

        //     $table->string('extra_1')->nullable();
        //     $table->string('extra_2')->nullable();
        //     $table->string('extra_3')->nullable();
        //     $table->string('extra_4')->nullable();
        //     $table->string('extra_5')->nullable();

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('insurance_infos');
    }
}
