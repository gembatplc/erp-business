<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('sales_id')->constrained('sales')->onDelete('cascade');
            $table->integer('sales_quantity')->default(0);
            $table->float('sales_price_per_quantity')->default(0.00);
            $table->float('total_sales_price')->default(0);
            $table->boolean('discount_type')->default(0)->comment('0 = percentage, 1 = fixed');
            $table->integer('dicount')->default(0);
            $table->boolean('tax_type')->default(0)->comment(' 0 = percentage, 1 = fixed');
            $table->integer('tax')->nullable()->default(0);
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
        Schema::dropIfExists('product_sales');
    }
}
