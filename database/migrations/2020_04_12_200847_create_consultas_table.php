<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('motivo_consulta_id');
            $table->unsignedBigInteger('estado_id');
            $table->date('fecha_enviado')->nullable();
            $table->date('fecha_gestionado')->nullable();
            $table->date('fecha_cerrado')->nullable();
            $table->longText('comentario')->nullable();            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('motivo_consulta_id')->references('id')->on('motivo_consultas');
            $table->foreign('estado_id')->references('id')->on('estados');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
