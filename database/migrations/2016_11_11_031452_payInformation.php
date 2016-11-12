<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PayInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name',150)->nullable(false);
            $table->string('firtLastname',50)->nullable(false);
            $table->string('address',150)->nullable(false);
            $table->string('country',50)->nullable(false);
            $table->string('state',50)->nullable(false);
            $table->string('city',50)->nullable(false);
            $table->integer('plastic_number')->nullable(false)->unique();
            $table->string('expiration_date',5)->nullable(false);
            $table->tinyinteger('CVV')->nullable(false);
            $table->integer('postal_code')->nullable(false);                                      
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('payment_information');
    }
}
