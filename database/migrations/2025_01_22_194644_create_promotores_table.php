<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promotores', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('email');
            $table->string('direccion');
            $table->integer('genero');
            $table->date('fecha');
            $table->integer('edad');
            $table->string('profesion');
            $table->foreignId('circuito_id')->nullable()->references('id')->on('circuitos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('mision_id')->nullable()->references('id')->on('misions')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('promotores');
    }
};
