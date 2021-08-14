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
            $table->float('remaining_amount',10,2);
            $table->float('disburse_amount',10,2);
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('borrower_roll_number');
            $table->string('disbursed_by');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('borrower_roll_number')->references('roll_number')->on('borrowers')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('disbursed_by')->references('username')->on('users')->onUpdate('cascade')
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
