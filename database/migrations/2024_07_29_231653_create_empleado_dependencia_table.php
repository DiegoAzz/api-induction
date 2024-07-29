<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoDependenciaTable extends Migration
{
    public function up()
    {
        Schema::create('empleado_dependencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('dependencia_id');
            $table->timestamps();

            // Definir las relaciones con las tablas empleados y dependencias
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('dependencia_id')->references('id')->on('dependencias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleado_dependencia');
    }
}
