<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: payments
         */
        Schema::create('payments', function ($table) {
            $table->increments('id');
            $table->integer('order_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type', 200)->nullable();
            $table->integer('client_id')->nullable();
            $table->string('slug', 200)->nullable();
            $table->string('method', 200)->nullable();
            $table->text('address')->nullable();
            $table->string('code', 200)->nullable();
            $table->string('status', 200)->nullable();
            $table->string('tracking_id', 200)->nullable();
            $table->string('bank_ref_no', 200)->nullable();
            $table->string('card_name', 250)->nullable();
            $table->string('currency', 50)->nullable();
            $table->float('amount')->nullable();
            $table->string('trans_date', 200)->nullable();
            $table->text('custom_field')->nullable();
            $table->text('description')->nullable();
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
        Schema::drop('payments');
    }
}
