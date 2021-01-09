<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_nv');
            $table->string('month');
            $table->string('c01')->nullable();
            $table->string('c02')->nullable();
            $table->string('c03')->nullable();
            $table->string('c04')->nullable();
            $table->string('c05')->nullable();
            $table->string('c06')->nullable();
            $table->string('c07')->nullable();
            $table->string('c08')->nullable();
            $table->string('c09')->nullable();
            $table->string('c10')->nullable();
            $table->string('c11')->nullable();
            $table->string('c12')->nullable();
            $table->string('c13')->nullable();
            $table->string('c14')->nullable();
            $table->string('c15')->nullable();
            $table->string('c16')->nullable();
            $table->string('c17')->nullable();
            $table->string('c18')->nullable();
            $table->string('c19')->nullable();
            $table->string('c20')->nullable();
            $table->string('c21')->nullable();
            $table->string('c22')->nullable();
            $table->string('c23')->nullable();
            $table->string('c24')->nullable();
            $table->string('c25')->nullable();
            $table->string('c26')->nullable();
            $table->string('c27')->nullable();
            $table->string('c28')->nullable();
            $table->string('c29')->nullable();
            $table->string('c30')->nullable();
            $table->string('c31')->nullable();
            $table->string('c32')->nullable();
            $table->string('c33')->nullable();
            $table->string('c34')->nullable();
            $table->string('c35')->nullable();
            $table->string('c36')->nullable();
            $table->string('c37')->nullable();
            $table->string('c38')->nullable();
            $table->string('c39')->nullable();
            $table->string('c40')->nullable();
            $table->string('c41')->nullable();
            $table->string('c42')->nullable();
            $table->string('c43')->nullable();
            $table->string('c44')->nullable();
            $table->string('c45')->nullable();
            $table->string('c46')->nullable();
            $table->string('c47')->nullable();
            $table->string('c48')->nullable();
            $table->string('c49')->nullable();
            $table->string('c50')->nullable();
            $table->string('c51')->nullable();
            $table->string('c52')->nullable();
            $table->string('c53')->nullable();
            $table->string('c54')->nullable();
            $table->string('c55')->nullable();
            $table->string('c56')->nullable();
            $table->string('c57')->nullable();
            $table->string('c58')->nullable();
            $table->string('c59')->nullable();
            $table->string('c60')->nullable();
            $table->string('c61')->nullable();
            $table->string('c62')->nullable();
            $table->string('c63')->nullable();
            $table->string('c64')->nullable();
            $table->string('c65')->nullable();
            $table->string('c66')->nullable();
            $table->string('c67')->nullable();
            $table->string('c68')->nullable();
            $table->string('c69')->nullable();
            $table->string('c70')->nullable();
            $table->string('c71')->nullable();
            $table->string('c72')->nullable();
            $table->string('c73')->nullable();
            $table->string('c74')->nullable();
            $table->string('c75')->nullable();
            $table->string('c76')->nullable();
            $table->string('c77')->nullable();
            $table->string('c78')->nullable();
            $table->string('c79')->nullable();
            $table->string('c80')->nullable();
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
        Schema::dropIfExists('salaries');
    }
}
