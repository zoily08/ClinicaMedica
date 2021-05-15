<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type',['Químico','Físico'])->default('Químico');
            $table->json('inputs');
            $table->double('price',7,2)->default(0.00);
            $table->enum('status',['Activo','Incompleto','Desactivado'])->default('Activo');
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
        Schema::dropIfExists('medical_exams');
    }
}
