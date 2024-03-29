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
            $table->unsignedBigInteger('roll_number')->primary();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('borrower_gender');
            $table->string('borrower_address');
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('borrower_status'); //job status of the borrower
            $table->float('borrowed_amount',10,2);
            $table->string('user_username')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('loan_service_id')->nullable();
            $table->binary('borrower_photo');
            $table->timestamps();
            $table->string('status'); // approved or pending

            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade')
            ->onDelete('set null');
            $table->foreign('user_username')->references('username')->on('users')->onUpdate('cascade')
            ->onDelete('set null');
            $table->foreign('loan_service_id')->references('id')->on('loan_services')->onUpdate('cascade')
            ->onDelete('set null');
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
