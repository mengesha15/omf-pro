<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestedLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_loans', function (Blueprint $table) {
            $table->id();
            $table->double('requesed_amount');
            $table->unsignedBigInteger('borrower_id'); // Borrrower of the requested loan
            $table->unsignedBigInteger('requested_by');
            $table->unsignedBigInteger('approved_by');
            $table->unsignedBigInteger('loan_service_id');
            $table->timestamps();
            $table->string('status'); // approved or pending

            $table->foreign('borrower_id')->references('id')->on('borrowers')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('requested_by')->references('id')->on('users')->onUpdate('cascade')
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
        Schema::dropIfExists('requested_loans');
    }
}
