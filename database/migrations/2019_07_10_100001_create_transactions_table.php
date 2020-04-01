<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: transactions
         */
        Schema::create('transactions', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('user_type', 200)->nullable();
            $table->integer('seller_id')->nullable();
            $table->float('amount')->nullable();
            $table->float('tax_amount')->nullable();
            $table->string('tax_type', 50)->nullable();
            $table->string('status', 200)->nullable();
            $table->string('type', 200)->nullable();
            $table->string('bank_ref', 200)->nullable();
            $table->text('details')->nullable();
            $table->dateTime('date_from')->nullable();
            $table->dateTime('date_to')->nullable();
            $table->float('commission')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('transactions');
    }
}
