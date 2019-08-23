<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('purchase_id');
            $table->integer('product_id');
            $table->string('product_code', 50);
            $table->string('product_name', 255);
            $table->integer('quantity');
            $table->decimal('unit_price', 25, 2);
            $table->decimal('tax_amount', 25, 2)->nullable();
            $table->decimal('gross_total', 25, 2);
            $table->integer('tax_rate_id')->nullable();
            $table->string('tax', 255)->nullable();
            $table->decimal('val_tax', 25, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_items');
    }
}
