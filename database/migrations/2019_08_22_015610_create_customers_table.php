<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name', 55);
            $table->string('company', 255);
            $table->string('address', 255);
            $table->string('city', 55);
            $table->string('state', 55);
            $table->string('postal_code', 8);
            $table->string('country', 55)->default('CR');
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->tinyInteger('provincia')->nullable();
            $table->string('canton', 2)->nullable();
            $table->string('distrito', 2)->nullable();
            $table->string('barrio', 3)->nullable();
            $table->string('senas', 200)->nullable();
            $table->string('cf1', 100)->nullable();
            $table->string('cf2', 100)->nullable();
            $table->string('cf3', 100)->nullable();
            $table->string('cf4', 100)->nullable();
            $table->string('cf5', 100)->nullable();
            $table->string('cf6', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
