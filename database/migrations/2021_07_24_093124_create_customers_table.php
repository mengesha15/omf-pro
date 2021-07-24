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
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('address');
            $table->string('customer_status'); //has job or not if has what job
            $table->date('birthDate');
            $table->double('account_balance');
            $table->integer('phoneNumber');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('account_number');
            $table->unsignedBigInteger('saving_service_id');
            $table->binary('customerPhoto');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('account_number')->references('id')->on('accounts')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('saving_service_id')->references('id')->on('saving_services')->onUpdate('cascade')
            ->onDelete('cascade');
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
