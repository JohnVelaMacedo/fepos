<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_items', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('sale_id');
            $table->integer('product_id');
            $table->string('product_code', 55);
            $table->string('product_name', 255);
            $table->string('product_unit', 50);
            $table->integer('tax_rate_id')->nullable();
            $table->string('tax', 55)->nullable();
            $table->integer('quantity');
            $table->decimal('unit_price', 25, 2);
            $table->decimal('gross_total', 25, 2);
            $table->decimal('val_tax', 25, 2)->nullable();
            $table->string('serial_no', 255)->nullable();
            $table->decimal('discount_val', 25, 2)->nullable();
            $table->string('discount', 55)->nullable();
            $table->integer('discount_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_items');
    }
}
