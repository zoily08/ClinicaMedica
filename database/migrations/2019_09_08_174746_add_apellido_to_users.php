<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApellidoToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function(Blueprint $table){
         $table->string('apellidos')->after('name');
         $table->string('direccion')->after('apellidos');
         $table->string('fechanacimiento')->after('direccion');
         $table->string('edad')->after('fechanacimiento');
         $table->string('telefono')->after('edad');
         $table->string('estado')->after('telefono');
         


});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){
         $table->dropColumn('apellido');
         $table->dropColumn('direccion');
         $table->dropColumn('fechanacimiento');
         $table->dropColumn('edad');
         $table->dropColumn('telefono');
         $table->dropColumn('estado');
         


});

    }
}
