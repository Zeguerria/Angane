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
        Schema::create('type_parametres', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('libelle')->nullable();
            $table->string('desc')->nullable();
            $table->string('desc2')->nullable();
            $table->string('desc3')->nullable();
            $table->string('supprimer')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_parametres');
    }
};
