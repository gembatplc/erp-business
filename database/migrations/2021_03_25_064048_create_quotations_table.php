<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->dateTime('date');
            $table->string('reference_no');
            $table->dateTime('expiry_date');
            $table->tinyInteger('status')->default(0)->comment('0 = pending, 1 = published');
            $table->float('sub_total_amount')->default(0.00);
            $table->float('total_amount')->default(0.00);
            $table->float('advanced_amount')->default(0.00);
            $table->boolean('discount_type')->default(0)->comment('0 = percentage , 1 = fixed');
            $table->integer('discount')->default(0);
            $table->boolean('tax_type')->default(0)->comment('0 = percentage , 1 = fixed');
            $table->integer('tax')->default(0);
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
        Schema::dropIfExists('quotations');
    }
}
