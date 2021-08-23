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
            $table->unsignedBigInteger('borrower_roll_number')->unique(); // Borrrower of the requested loan
            $table->float('requested_amount',10,2);
            $table->string('requested_by')->nullable();
            $table->timestamps();
            $table->string('status'); // approved or pending
            $table->string('seen_unseen')->nullable();
            $table->foreign('borrower_roll_number')->references('roll_number')->on('borrowers')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('requested_by')->references('username')->on('users')->onUpdate('cascade')
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
        Schema::dropIfExists('requested_loans');
    }
}
