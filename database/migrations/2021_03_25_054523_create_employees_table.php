<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->foreignId('designation_id')->constrained('designations')->onDelete('cascade');
            $table->foreignId('shift_id')->constrained('shifts')->onDelete('cascade');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->text('present_address');
            $table->dateTime('join_date');
            $table->tinyInteger('duty_type')->default(1)->comment('1 = full time , 0 = part time , 2 = contractual'); # 1 = full time , 0 = part time , 2 = contractual
            $table->tinyInteger('salary_type')->default(2)->comment('1 = hourly, 2 = monthly, 3 = yearly, 0 = base'); # 1 = hourly , 2 = monthly , 0 = base , 3 = yearly
            $table->float('salary')->default(0.00);
            $table->boolean('status')->default(1)->comment('1 = active, 2 = deactivate'); # 1 = active , 0 = deactivate
            $table->string('employee_unique_id')->unique();
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
        Schema::dropIfExists('employees');
    }
}
