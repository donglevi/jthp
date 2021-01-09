<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_nv');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('reset_password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status');
            $table->boolean('first_login');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('sex')->nullable();
            $table->string('level')->nullable();
            $table->string('ip_adress')->nullable();
            $table->timestamp('login_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
