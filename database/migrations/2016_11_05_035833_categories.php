<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->string('name',100)->default('Category one');
            $table->string('image',150)->default('');
=======
            $table->string('name',100)->default("Category one");
            $table->string('image',300);
>>>>>>> 51adbf8d39fcac10ca89efc99069782843d6bc4c
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
        Schema::drop('categories');
    }
}
