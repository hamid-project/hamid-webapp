<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\BaseModel;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name_first', BaseModel::PERSON_NAME_LENGTH);
            $table->string('name_middle', BaseModel::PERSON_NAME_LENGTH)->nullable();
            $table->string('name_last', BaseModel::PERSON_NAME_LENGTH);
            $table->string('contact_email1', BaseModel::EMAIL_LENGTH);
            $table->string('contact_email2', BaseModel::EMAIL_LENGTH)->nullable();
            $table->string('contact_phone1', BaseModel::PHONE_LENGTH)->nullable();
            $table->string('contact_phone2', BaseModel::PHONE_LENGTH)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('admins');
    }
}
