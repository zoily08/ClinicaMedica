<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_result', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_patient_id');
            $table->unsignedInteger('result_id');
            $table->foreign('exam_patient_id')->references('id')->on('exam_patient');
            $table->foreign('result_id')->references('id')->on('results');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_result');
    }
}
