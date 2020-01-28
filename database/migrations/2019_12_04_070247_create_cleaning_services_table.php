<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('rate_per_hour')->default(0);
            $table->enum('service_for', ['residential', 'commercial']);
            $table->enum('service_type', ['regular','once_off', 'end_of_lease', 'other'])->default(NULL)->nullable();
            $table->boolean('is_other_with_price')->default(0);
            $table->enum('price_calculation', ['direct', 'room', 'panel', 'sq'])->default(NULL)->nullable();
            $table->string('minimum_service_hours')->default(1);
            $table->tinyInteger('status')->comment('Active - 1, Deactive - 0')->default(0);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cleaning_services');
    }
}
