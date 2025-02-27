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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantasia', 100);
            $table->string('razao_social', 100);
            $table->string('cnpj')->unique();
            $table->unsignedBigInteger('bandeira_id');
            $table->timestamps();

            $table->foreign('bandeira_id')->references('id')->on('bandeiras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adm_unidades');
    }
};
