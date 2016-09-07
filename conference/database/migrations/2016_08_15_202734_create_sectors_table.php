<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->increments('id');

            $table->text('name');
            $table->integer('price');
            $table->integer('stock');
            $table->integer('price_before');
            $table->enum('state_promotion', array('enable', 'disabled'));
            $table->enum('type_sale', array('preventa','oficial'));
            $table->enum('state', array('enable','disabled'));
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
        Schema::drop('sectors');
    }
}
