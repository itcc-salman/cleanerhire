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
            $table->boolean('residential')->default(0);
            $table->boolean('commercial')->default(0);
            $table->boolean('once_off')->default(0);
            $table->boolean('regular')->default(0);
            $table->boolean('individual')->default(0);
            $table->boolean('company')->default(0);
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
