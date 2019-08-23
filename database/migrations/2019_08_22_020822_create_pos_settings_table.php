<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_settings', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('cat_limit');
            $table->integer('pro_limit');
            $table->integer('default_category');
            $table->integer('default_customer');
            $table->integer('default_biller');
            $table->string('display_time', 3)->default('yes');
            $table->string('cf_title1', 255)->nullable();
            $table->string('cf_title2', 255)->nullable();
            $table->string('cf_value1', 255)->nullable();
            $table->string('cf_value2', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pos_settings');
    }
}
