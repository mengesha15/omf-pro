<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saving_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_type'); // withdrawal or deposit
            $table->string('from_or_to')->nullable();
            $table->float('transaction_amount',10,2);
            $table->unsignedBigInteger('customer_account_number');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->string('user_username');  // which user  does  the transaction?
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('customer_account_number')->references('account_number')->on('customers')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_username')->references('username')->on('users')->onUpdate('cascade')
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
        Schema::dropIfExists('saving_transactions');
    }
}
