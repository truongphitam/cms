<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('image', 255)->nullable()->default('http://placehold.it/1200x630');
            $table->string('logo', 255)->nullable()->default('http://placehold.it/500x500');
            $table->string('phone', 255)->nullable();
            $table->string('hotline', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('plus', 255)->nullable();
            $table->string('pinterest', 255)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->string('tumblr', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->integer('user_id')->nullable();
            $table->text('expert')->nullable();
            $table->text('description')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
