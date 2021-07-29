<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('borrower_address');
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('borrower_status'); //job status of the borrower
            $table->double('borrowed_amount');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('loan_service_id');
            $table->binary('borrower_photo');
            $table->timestamps();
            $table->string('status'); // approved or pending

            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('loan_service_id')->references('id')->on('loan_services')->onUpdate('cascade')
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
        Schema::dropIfExists('borrowers');
    }
}
