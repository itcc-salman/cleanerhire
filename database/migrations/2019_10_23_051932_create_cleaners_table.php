<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleanersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone_secondary')->nullable();
            $table->string('email')->nullable();
            $table->string('company_name')->nullable();
            $table->string('website')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();

            $table->string('tfn')->nullable();
            $table->string('abn')->nullable();
            $table->string('visa_status')->nullable();
            $table->string('visa_status_other')->nullable();
            $table->string('police_check')->nullable();
            $table->string('own_car')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('driver_license_state')->nullable();
            $table->string('driver_license_number')->nullable();
            $table->string('nationality')->nullable();
            $table->text('language')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('bsb')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_name')->nullable();

            $table->text('doc_driving_licence')->nullable();
            $table->text('doc_driving_licence_status')->nullable();
            $table->text('doc_driving_licence_comment')->nullable();
            $table->text('doc_medicare_card')->nullable();
            $table->text('doc_medicare_card_status')->nullable();
            $table->text('doc_medicare_card_comment')->nullable();
            $table->text('doc_passport')->nullable();
            $table->text('doc_passport_status')->nullable();
            $table->text('doc_passport_comment')->nullable();
            $table->text('doc_bank_statement')->nullable();
            $table->text('doc_bank_statement_status')->nullable();
            $table->text('doc_bank_statement_comment')->nullable();
            $table->text('doc_utility_bill')->nullable();
            $table->text('doc_utility_bill_status')->nullable();
            $table->text('doc_utility_bill_comment')->nullable();
            $table->text('doc_certifications')->nullable();
            $table->text('doc_certifications_status')->nullable();
            $table->text('doc_certifications_comment')->nullable();
            $table->text('doc_police_check')->nullable();
            $table->text('doc_police_check_status')->nullable();
            $table->text('doc_police_check_comment')->nullable();


            $table->text('comments')->nullable();
            $table->tinyInteger('status')->comment('Active - 1, Deactive - 0');

            $table->integer('last_step');
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->softDeletes();

            $table->index(['deleted_at']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cleaners');
    }
}
