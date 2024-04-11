<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("type_parametres")->insert([
            ["id"=> 1, "code" => "Aucun", "libelle" => "Aucun", "desc" => "Aucun"],
            ["id"=> 2, "code" => "PROVINCES", "libelle" => "Liste des Provinces", "desc" => ""],
            ["id"=> 3, "code" => "COMMUNES", "libelle" => "Liste des communes", "desc" => ""],
            ["id"=> 4, "code" => "ARRONDISSEMENTS", "libelle" => "Liste des arrondissements", "desc" => ""],
            ["id"=> 5, "code" => "QUARTIERS", "libelle" => "Liste des quartiers", "desc" => ""],
            ["id"=> 6, "code" => "NATIONALITES", "libelle" => "Liste des nationalités", "desc" => ""],
		    ["id"=> 7, "code" => "GENRES", "libelle" => "Liste des genres", "desc" => ""],
		    ["id"=> 8, "code" => "STATUT", "libelle" => "Liste des statut", "desc" => ""],
		    ["id"=> 9, "code" => "ENTITES", "libelle" => "Entité Administrative", "desc" => ""],
		    ["id"=> 10, "code" => "SENSE", "libelle" => "Liste des senses de documents", "desc" => ""],
		    ["id"=> 11, "code" => "PAYS",  "libelle" => "Liste des pays", "desc" => ""],
		    ["id"=> 12, "code" => "TYPEREG",  "libelle" => "Types de regroupement", "desc" => ""],
		    ["id"=> 13, "code" => "PROFIL",  "libelle" => "Profils Utilisateurs", "desc" => ""],
		    ["id"=> 14, "code" => "HABILITATION",  "libelle" => "Habilitations Utilisateurs", "desc" => ""],
		    ["id"=> 15, "code" => "CATEGORIE",  "libelle" => "Categotie documents", "desc" => ""],
		    ["id"=> 16, "code" => "GESTIONAIRE",  "libelle" => "Gestion des gestionaires", "desc" => ""],
		    ["id"=> 17, "code" => "EMETTEURS",  "libelle" => "Gestion des fonction des émemtteurs", "desc" => ""],
		    ["id"=> 18, "code" => "DESTINATAIRE",  "libelle" => "Gestion des fonction des destinataires", "desc" => ""],
		    ["id"=> 19, "code" => "RECEVEURS",  "libelle" => "Gestion des fonction des receveurs", "desc" => ""],
        ]);
    }
}
