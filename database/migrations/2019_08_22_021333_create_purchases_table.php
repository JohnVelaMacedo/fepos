<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->integer('id');
            $table->string('reference_no', 55);
            $table->integer('warehouse_id');
            $table->integer('supplier_id');
            $table->string('supplier_name', 255);
            $table->date('date');
            $table->text('note');
            $table->decimal('total', 25, 2);
            $table->string('user', 255)->nullable();
            $table->decimal('total_tax', 25, 2)->default(0.00);
            $table->decimal('inv_total', 25, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
