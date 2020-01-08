<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('label_id');
            $table->foreign('label_id')->references('id')->on('labels');
            $table->integer('reg_no');
            $table->string('reg_code');
            $table->integer('roll')->nullable();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('phone');
            $table->date('date_of_birth');
            $table->date('admission_date');
            $table->string('blood_group')->nullable();
            $table->string('session');
            $table->double('admission_free',8,2)->nullable();
            $table->string('gender');
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('students');
    }
}
