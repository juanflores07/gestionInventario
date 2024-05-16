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
        Schema::create('productos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_producto')->primary(); // ID autoincremental
            $table->string('codigo', 25);
            $table->string('nombre', 60);
            $table->date('fecha_ingreso');
            $table->date('fecha_vencimineto');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores')->onDelete('cascade');
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
