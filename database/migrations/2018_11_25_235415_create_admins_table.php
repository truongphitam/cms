<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('website')->default('http://giaiphapvang.com.vn')->nullable();
            $table->string('phone')->default('0979322855')->nullable();
            $table->string('address')->default('0979322855')->nullable();
            $table->string('role')->default('contributor');
            $table->string('image')->default('http://placehold.it/120x120');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
