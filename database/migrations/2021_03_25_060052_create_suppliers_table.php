<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_group_id')->constrained('supplier_groups')->onDelete('cascade');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->integer('supplier_unique_id')->unique();
            $table->text('present_address');
            $table->text('permanent_address');
            $table->float('previous_due')->default(0.00);
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('national_id')->unique()->nullable();
            $table->string('company_name');
            $table->boolean('status')->default(1)->comment('1 = active , 0 = deactivate');
            $table->boolean('gender')->nullable()->comment('1 = male, 0 = female');
            $table->dateTime('date_of_birth')->nullable();
            $table->string('blood_group')->nullable()->comment('a+, b+, ab+, o+, a-, b-, ab-, 0-');
            $table->boolean('citizenship')->default(1)->comment('1 = yes, 0 = no');
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
        Schema::dropIfExists('suppliers');
    }
}
