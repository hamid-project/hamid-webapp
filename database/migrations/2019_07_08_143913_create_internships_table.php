<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->text('description');
            $table->string('position', 20);
            $table->date('internship_begin');
            $table->date('internship_end');
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('company_staff_id');
            $table->integer('status');
            $table->integer('number_of_interns');
            $table->json('potentials');
            $table->timestamps();
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
            $table->foreign('company_staff_id')->references('id')->on('company_staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
}
