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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('motivo_consulta_id');
            $table->unsignedBigInteger('estado_id');
            $table->dateTime('fecha_enviado', 0)->nullable();
            $table->dateTime('fecha_gestionado', 0)->nullable();
            $table->dateTime('fecha_cerrado', 0)->nullable();
            $table->longText('comentario', 0)->nullable();   
            $table->longText('comentario_cierre', 0)->nullable();  
            $table->longText('estado_cierre', 0)->nullable();  
            $table->string('responsable')->nullable();    
            $table->string('nombre_emergencia')->nullable();
            $table->string('telefono_emergencia')->nullable();                    
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
