<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('transaction_nit');
            $table->text('transaction_name');
            $table->text('transaction_phone');
            $table->text('transaction_response');
            $table->text('transaction_assistants');
            $table->integer('transaction_total');

            $table->integer('sector_price');
            $table->integer('sector_quantity');
            $table->enum('payment_type', array('tigo_money','multipago'));

            $table->integer('transaction_user')->unsigned();
            $table->foreign('transaction_user')->references('id')->on('users');

            $table->integer('transaction_sector')->unsigned();
            $table->foreign('transaction_sector')->references('id')->on('sectors');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
