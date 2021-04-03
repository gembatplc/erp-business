<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->dateTime('date');
            $table->string('reference_no')->unique();
            $table->string('invoice_no')->unique();
            $table->tinyInteger('purchase_status')->default(0)->comment('0 = pending, 1 = ordered, 2 = received');
            $table->boolean('payment_status')->default(1)->comment('1 = pending , 0 = due');
            $table->float('sub_total_amount')->default(0.00);
            $table->float('total_amount')->default(0.00);
            $table->float('paid_amount')->default(0.00);
            $table->float('due_amount')->default(0.00);
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
        Schema::dropIfExists('purchases');
    }
}
