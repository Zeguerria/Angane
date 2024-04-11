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
        Schema::create('parametres', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('libelle')->nullable();
            $table->text('desc')->nullable();
            $table->text('desc2')->nullable();
            $table->text('desc3')->nullable();
            $table->integer('parent_id')->default(1);
            $table->string('supprimer')->default(0);
            $table->foreignId('type_parametre_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametres');
    }
};
