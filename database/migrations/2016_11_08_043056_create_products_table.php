<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->default("product");
            $table->string('description',150)->default("description product");
            $table->string('image',150)->default("https://t3.ftcdn.net/jpg/00/93/69/54/240_F_93695419_PygMAPp64jG2zzULBColq84tBBD7Vfok.jpg");
            $table->integer('quantity')->default(0);
            $table->decimal('price',16,4)->default(0);
            $table->tinyinteger('valoration')->default(1);
            $table->integer('sellers')->default(0);
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->tinyinteger('discount')->default(0);
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
        Schema::drop('products');

    }
}
