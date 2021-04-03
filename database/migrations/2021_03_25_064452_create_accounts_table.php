<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_type_id')->constrained('account_types')->onDelete('cascade');
            $table->string('name');
            $table->integer('account_number')->unique();
            $table->float('initial_balance')->default(0.00);
            $table->float('balance')->default(0.00);
            $table->boolean('status')->default(0)->comment('0 = deativate , 1 = active');
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
        Schema::dropIfExists('accounts');
    }
}
