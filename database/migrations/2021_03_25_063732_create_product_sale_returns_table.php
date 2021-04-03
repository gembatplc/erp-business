<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSaleReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sale_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('sale_return_id')->constrained('sale_returns')->onDelete('cascade');
            $table->integer('sales_return_quantity')->default(0);
            $table->float('sales_return_price_per_quantity')->default(0.00);
            $table->float('total_sales_return_price')->default(0.00);
            $table->boolean('discount_type')->default(0)->comment('0 = percentage, 1 = fixed');
            $table->integer('discount')->default(0);
            $table->boolean('tax_type')->default(0)->comment('0 = percentage, 1 = fixed');
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
        Schema::dropIfExists('product_sale_returns');
    }
}
