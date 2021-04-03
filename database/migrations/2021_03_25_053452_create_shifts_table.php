<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->tinyInteger('shift_type')->default(0)->comment('0 = fixed, 1 = flexiable'); # 0 = fixed , 1 = flexiable
            $table->time('start_time');
            $table->time('end_time');
            $table->string('weekly_holiday')->default('friday')->comment('friday, saturday, sunday, monday, tuesday, wednesday, thursday');
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
        Schema::dropIfExists('shifts');
    }
}
