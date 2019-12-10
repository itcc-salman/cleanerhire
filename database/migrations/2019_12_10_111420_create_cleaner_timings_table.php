<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleanerTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaner_timings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cleaner_id')->unsigned();
            $table->string('day');
            $table->string('start_hours');
            $table->string('end_hours')->nullable();
            $table->boolean('is_opened')->default(0);
            $table->timestamps();

            $table->foreign('cleaner_id')->references('id')->on('cleaners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cleaner_timings');
    }
}
