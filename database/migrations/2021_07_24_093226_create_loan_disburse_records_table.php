<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDisburseRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_disburse_records', function (Blueprint $table) {
            $table->id();
            $table->double('remaining_amount');
            $table->double('disburse_amount');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('borrower_id');
            $table->unsignedBigInteger('disbursed_by');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('borrower_id')->references('id')->on('borrowers')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('disbursed_by')->references('id')->on('users')->onUpdate('cascade')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_disburse_records');
    }
}
