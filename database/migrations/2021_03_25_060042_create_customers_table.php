<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_group_id')->constrained('customer_groups')->onDelete('cascade');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->integer('customer_unique_id')->unique();
            $table->text('present_address');
            $table->text('permanent_address');
            $table->float('previous_due')->default(0.00);
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('national_id')->unique();
            $table->string('company_name');
            $table->boolean('status')->default(1)->comment('1 = active, 0 = deactivate'); # 1 = active , 0 = deactivate
            $table->boolean('gender')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->tinyInteger('marital_status')->default(0)->comment('0 = single , 1 = married, 2 = divorced, 3 = widowed'); # 0 = single , 1 = married , 2 = divorced , 3 = widowed
            $table->string('blood_group')->nullable();
            $table->boolean('citizenship')->default(1)->comment('1 = yes , 0 = no'); # 1 = yes , 0 = no
            $table->string('alternative_email')->nullable();
            $table->integer('alternative_phone')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
