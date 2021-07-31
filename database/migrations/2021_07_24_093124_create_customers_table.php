<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('lastName');
            $table->string('customer_gender');
            $table->string('customer_address');
            $table->string('customer_status'); //has job or not if has what job
            $table->date('birth_date');
            $table->double('account_balance');
            $table->string('phone_number');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('saving_service_id');
            $table->binary('customer_photo');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('account_numbers')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('saving_service_id')->references('id')->on('saving_services')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
