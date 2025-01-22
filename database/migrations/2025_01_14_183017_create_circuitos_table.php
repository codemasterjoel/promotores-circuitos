<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('circuitos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('codigo_centro');
            $table->string('centro');
            $table->string('codigo_comuna');
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('circuitos');
    }
};
