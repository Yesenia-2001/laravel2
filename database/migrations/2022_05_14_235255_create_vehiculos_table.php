<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->char('matricula');
            $table->string('nombreconduc');            
            $table->integer('año');
            $table->char('placa');
            $table->string('tecnomecanica');
            $table->string('soat');
            $table->string('tarjetapropiedad');
            $table->integer('documentoconduc');
            $table->date('fechavencimiento');

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
        Schema::dropIfExists('vehiculos');
    }
};
