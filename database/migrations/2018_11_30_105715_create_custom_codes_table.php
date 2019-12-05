<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('css')->nullable();
            $table->text('js')->nullable();
            $table->text('between_head')->nullable();
            $table->text('after_head')->nullable();
            $table->text('after_body')->nullable();
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
        Schema::dropIfExists('custom_codes');
    }
}
