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
            $table->unsignedBigInteger('account_number')->primary();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('customer_gender');
            $table->string('customer_address');
            $table->string('customer_status'); //has job or not if has what job
            $table->date('birth_date');
            $table->float('account_balance',10,2);
            $table->string('phone_number');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('saving_service_id')->nullable();
            $table->binary('customer_photo');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('saving_service_id')->references('id')->on('saving_services')->onUpdate('cascade')->onDelete('set null');
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
