<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovedLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_loans', function (Blueprint $table) {
            $table->id();
            $table->float('approved_amount',10,2);
            $table->unsignedBigInteger('borrower_roll_number')->unique();
            $table->string('requested_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->timestamps();
            $table->string('status');

            $table->foreign('borrower_roll_number')->references('roll_number')->on('borrowers')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('requested_by')->references('username')->on('users')->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('approved_by')->references('username')->on('users')->onUpdate('cascade')
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
        Schema::dropIfExists('approved_loans');
    }
}
