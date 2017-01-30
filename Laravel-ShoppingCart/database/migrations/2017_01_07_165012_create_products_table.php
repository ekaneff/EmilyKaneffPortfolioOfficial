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
            //Define table columns here
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->mediumText('description');
            $table->integer('price');
            //inStock should be changed to 'quantity' so model can be referenced for 'inventory management' and 'shopping cart'
            $table->integer('inStock');
            $table->string('imgPath');

            $table->index('name');
            $table->index('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
