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
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->enum('booking_type', ['residential','commercial']);
            $table->unsignedBigInteger('property_id')->unsigned()->nullable();
            $table->string('services');
            $table->enum('visit_type', ['weekly','fortnight','once'])->default('weekly');
            $table->string('duration')->default('1');
            $table->date('booking_date');
            $table->string('booking_time');
            $table->enum('gender_pref', ['male','female','none'])->default('none');
            $table->string('has_pet')->nullable();
            $table->string('has_pet_optional')->nullable();

            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->unsignedInteger('rooms')->nullable();
            $table->unsignedInteger('bathrooms')->nullable();
            $table->unsignedBigInteger('assigned_user_id')->nullable();
            $table->unsignedBigInteger('assigned_cleaner_id')->nullable();
            $table->enum('services_date_type', ['asap','datetime'])->default('asap');

            $table->tinyInteger('status')->comment('New - 0, Pending - 1, Assigned - 2, In Progress - 3, Completed - 4, Approved - 5, Cancelled - 6')->default(0);

            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->softDeletes();

            $table->index(['deleted_at']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('assigned_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assigned_cleaner_id')->references('id')->on('cleaners')->onDelete('cascade');
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
