<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->foreignId('warranty_id')->constrained('warranties')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('sku')->unique();
            $table->integer('purchase_quantity')->default(0);
            $table->integer('stock_quantity')->default(0);
            $table->float('purchase_price')->default(0.00);
            $table->float('stock_price')->default(0.00);
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
