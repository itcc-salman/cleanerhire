<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('document_for')->default('0')->comment('0 - all,1 - cleaner,2 - company');
            $table->string('name',255);
            $table->text('document_name');
            $table->tinyInteger('visible_to_cleaner')->default(0);
            $table->tinyInteger('visible_to_company')->default(0);
            $table->tinyInteger('status')->default('1')->comment('Active - 1, Deactive - 0');
            $table->integer('created_by');
            $table->integer('modified_by');
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
        Schema::dropIfExists('resources');
    }
}
