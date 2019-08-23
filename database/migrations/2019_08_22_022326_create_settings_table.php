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
            $table->integer('setting_id');
            $table->string('logo', 255);
            $table->string('logo2', 255);
            $table->string('site_name', 55);
            $table->string('language', 20);
            $table->tinyInteger('default_warehouse');
            $table->string('currency_prefix', 3);
            $table->tinyInteger('default_invoice_type');
            $table->tinyInteger('default_tax_rate');
            $table->tinyInteger('rows_per_page');
            $table->tinyInteger('no_of_rows');
            $table->tinyInteger('total_rows');
            $table->string('version', 5)->default('2.3');
            $table->integer('default_tax_rate2')->default(0);
            $table->integer('dateformat');
            $table->string('sales_prefix', 20);
            $table->string('quote_prefix', 55);
            $table->string('purchase_prefix', 55);
            $table->string('transfer_prefix', 55);
            $table->string('barcode_symbology', 20);
            $table->string('theme', 20);
            $table->tinyInteger('product_serial');
            $table->integer('default_discount');
            $table->tinyInteger('discount_option');
            $table->tinyInteger('discount_method');
            $table->tinyInteger('tax1');
            $table->tinyInteger('tax2');
            $table->tinyInteger('restrict_sale')->default(0);
            $table->tinyInteger('restrict_user')->default(0);
            $table->tinyInteger('restrict_calendar')->default(0);
            $table->tinyInteger('bstatesave')->default(0);
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
