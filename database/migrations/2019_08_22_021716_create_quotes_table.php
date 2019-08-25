<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->integer('id');
            $table->string('reference_no', 55);
            $table->integer('warehouse_id')->nullable();
            $table->integer('biller_id');
            $table->string('biller_name', 55);
            $table->integer('customer_id');
            $table->string('customer_name', 55);
            $table->date('date');
            $table->text('note')->nullable();
            $table->text('internal_note')->nullable();
            $table->decimal('inv_total', 25, 2);
            $table->decimal('total_tax', 25, 2)->nullable();
            $table->decimal('total', 25, 2);
            $table->integer('invoice_type')->nullable();
            $table->string('in_type', 55)->nullable();
            $table->decimal('total_tax2', 25, 2)->nullable();
            $table->integer('tax_rate2_id')->nullable();
            $table->string('user', 255)->nullable();
            $table->string('updated_by', 255)->nullable();
            $table->decimal('inv_discount', 25, 2)->nullable();
            $table->integer('discount_id')->nullable();
            $table->decimal('shipping', 25, 2)->nullable()->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
