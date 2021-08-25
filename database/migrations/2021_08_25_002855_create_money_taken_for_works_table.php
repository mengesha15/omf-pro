<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyTakenForWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_taken_for_works', function (Blueprint $table) {
            $table->id();
            $table->string('user_username');
            $table->float('taken_amount',10,2);
            $table->string('given_by');
            $table->timestamps();

            $table->foreign('user_username')->references('username')->on('users')->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreign('given_by')->references('username')->on('users')->onUpdate('cascade')
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
        Schema::dropIfExists('money_taken_for_works');
    }
}
