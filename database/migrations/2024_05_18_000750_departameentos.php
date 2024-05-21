<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->increments('id_departamento');
            $table->string('nombre');
            $table->unsignedInteger('id_pais'); // Clave foránea

            // Definir la relación de clave foránea
            $table->foreign('id_pais')->references('id_pais')->on('pais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
