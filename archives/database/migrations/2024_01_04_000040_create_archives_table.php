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
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('libelle')->nullable();
            $table->string('objet')->nullable();
            $table->text('desc')->nullable();
            $table->text('desc2')->nullable();
            $table->string('emetteur')->nullable();
            $table->string('date_emission')->nullable();
            $table->string('destinataire')->nullable();
            $table->string('date_reception')->nullable();
            $table->string('receveur')->nullable();
            $table->string('ampillation')->nullable();
            $table->string('type_fichier')->nullable();
            $table->string('fichier')->nullable();
            $table->string('date')->nullable();
            $table->string('supprimer')->default(0);
            $table->foreignId('gestionaire_id')->references('id')->on('parametres')->constrained();
            $table->foreignId('emeteur_id')->references('id')->on('parametres')->constrained();
            $table->foreignId('destinataire_id')->references('id')->on('parametres')->constrained();
            $table->foreignId('receveur_id')->references('id')->on('parametres')->constrained();
            $table->foreignId('type_id')->references('id')->on('parametres')->constrained();
            $table->foreignId('categorie_id')->references('id')->on('parametres')->constrained();
            $table->foreignId('poste_id')->references('id')->on('parametres')->constrained();
            $table->foreignId('user_id')->references('id')->on('users')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
