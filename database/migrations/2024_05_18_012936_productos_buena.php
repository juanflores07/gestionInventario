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
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id_producto');
            $table->string('codigo', 20);
            $table->string('nombre', 50);
            $table->date('fecha_ingreso');
            $table->date('fecha_vencimiento')->nullable();
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->string('descripcion', 100);
            $table->unsignedInteger('id_proveedor');

            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedor')->onDelete('cascade');
            
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
