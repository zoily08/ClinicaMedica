<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaMedicalExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_medical_exam', function (Blueprint $table) {
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('medical_exam_id');
            $table->integer('correlative');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('medical_exam_id')->references('id')->on('medical_exams');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_medical_exam');
    }
}
