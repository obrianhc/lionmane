<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto', function (Blueprint $table) {
            $table->bigIncrements('idContacto');
            $table->string('nombre', 40);
            $table->string('apellido', 40);
            $table->string('apodo', 40)->nullable();
            $table->datetime('fecha_nac');
            $table->string('genero', 10);
            $table->binary('imagen')->nullable();
            $table->datetime('fecha_creacion');
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
        Schema::dropIfExists('contacto');
    }
}
