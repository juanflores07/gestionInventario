<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('producto', function (Blueprint $table) {
            $table->date('fecha_vencimiento')->nullable();
            $table->string('codigo')->nullable();
            $table->decimal('precio', 8, 2)->nullable(); // Decimal con 8 dígitos en total y 2 dígitos después del punto decimal
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
