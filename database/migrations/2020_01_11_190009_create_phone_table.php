<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefono', function (Blueprint $table) {
            $table->bigIncrements('idTelefono');
            $table->unsignedInteger('idContacto');
            $table->string('numero_de_telefono', 8);
            $table->string('categoria', 40);
            $table->integer('deleted', 0);
            $table->foreign('idContacto')->references('idContacto')->on('contacto');
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
        Schema::dropIfExists('telefono');
    }
}
