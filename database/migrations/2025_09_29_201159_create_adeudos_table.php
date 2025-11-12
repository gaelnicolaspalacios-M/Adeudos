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
        Schema::create('adeudos', function (Blueprint $table) {
            $table->id();
            $table->string('no_de_control',10)->nullable();
            $table->string('tipo',255)->nullable();
            $table->string('periodo',10)->nullable();
            $table->string('laboratorio',50)->nullable();
            $table->integer('costo')->nullable();
            $table->date('fecha')->nullable();
            $table->string('descripcion',255)->nullable();
            $table->string('clave_area',6)->nullable();
            $table->timestamps(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adeudos');
    }
};
