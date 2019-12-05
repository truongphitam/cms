<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->integer('user_id');
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('galleys');
    }
}
