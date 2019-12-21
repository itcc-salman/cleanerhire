<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->enum('booking_type', ['residential','commercial']);
            $table->integer('property_id')->unsigned()->nullable();
            $table->string('services');
            $table->enum('visit_type', ['weekly','fortnight','once'])->default('weekly');
            $table->string('duration')->default('1');
            $table->date('booking_date');
            $table->string('booking_time');
            $table->enum('gender_pref', ['male','female','none'])->default('none');
            $table->string('has_pet');

            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            $table->tinyInteger('status')->comment('Active - 1, Deactive - 0');
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->softDeletes();

            $table->index(['deleted_at']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
