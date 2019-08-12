<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->string('name_first', 20);
            $table->string('name_middle', 20);
            $table->string('name_last', 20);
            $table->string('contact_email1', 100);
            $table->string('contact_phone1', 20)->nullable();
            $table->string('contact_email2', 100)->nullable();
            $table->string('contact_phone2', 20)->nullable();
            $table->string('department', 30);
            $table->string('address', 100);
            $table->string('website', 100);
            $table->boolean('acceptance_corporate_gift');
            $table->boolean('acceptance_internship');
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('company_staff');
    }
}
