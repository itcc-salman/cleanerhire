<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleanerServiceMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaner_service_mappings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cleaner_id')->unsigned();
            $table->integer('cleaning_service_id')->unsigned();
            $table->boolean('has_equipments')->default(0);
            $table->timestamps();

            $table->foreign('cleaner_id')->references('id')->on('cleaners')->onDelete('cascade');
            $table->foreign('cleaning_service_id')->references('id')->on('cleaning_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cleaner_service_mappings');
    }
}
