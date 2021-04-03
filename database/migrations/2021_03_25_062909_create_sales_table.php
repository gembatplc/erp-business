<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->dateTime('date');
            $table->string('reference_no')->unique();
            $table->string('invoice_no')->unique();
            $table->tinyInteger('sales_status')->default(0)->comment('0 = pending , 1 = ordered, 2 = received');
            $table->boolean('payment_status')->default(1)->comment('1 = paid , 0 = due');
            $table->float('sub_total_amount')->default(0.00);
            $table->float('total_amount')->default(0.00);
            $table->float('paid_amount')->default(0.00);
            $table->float('due_amount')->default(0.00);
            $table->float('advance_amount')->default(0.00);
            $table->boolean('discount_type')->default(0)->comment(' 0 = percentage, 1 = fixed');
            $table->integer('discount')->default(0);
            $table->boolean('tax_type')->default(0)->comment('0 = percentage, 1 = fixed');
            $table->integer('tax')->default(0);
            $table->integer('shipping_cost')->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
