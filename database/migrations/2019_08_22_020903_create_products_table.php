<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id');
            $table->string('code', 50);
            $table->char('name', 255);
            $table->string('unit', 50)->nullable();
            $table->string('size', 55);
            $table->decimal('cost', 25, 2)->nullable();
            $table->decimal('price', 25, 2);
            $table->integer('alert_quantity')->default(20);
            $table->string('image')->nullable()->default('no_image.jpg');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->string('cf1', 255)->nullable();
            $table->string('cf2', 255)->nullable();
            $table->string('cf3', 255)->nullable();
            $table->string('cf4', 255)->nullable();
            $table->string('cf5', 255)->nullable();
            $table->string('cf6', 255)->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('tax_rate')->nullable();
            $table->tinyInteger('track_quantity')->nullable()->default(1);
            $table->text('details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
