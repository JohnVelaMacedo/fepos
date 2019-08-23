<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billers', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name', 55);
            $table->string('company', 255);
            $table->string('address', 255);
            $table->string('city', 55);
            $table->string('state', 55);
            $table->string('postal_code', 8);
            $table->string('country', 55);
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->string('logo', 100);
            $table->text('invoice_footer');
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
        Schema::dropIfExists('billers');
    }
}
