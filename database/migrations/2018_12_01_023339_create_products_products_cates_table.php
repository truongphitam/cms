<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsProductsCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_products_cates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id')->unsigned()->index();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            //
            $table->integer('products_cate_id')->unsigned()->index();
            $table->foreign('products_cate_id')->references('id')->on('products_cates')->onDelete('cascade');
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
        Schema::dropIfExists('products_products_cates');
    }
}
