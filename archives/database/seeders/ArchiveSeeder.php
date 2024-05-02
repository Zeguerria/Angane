<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("archives")->insert([
            ["id"=> 1, "code" => "A-220", "libelle" => "Archive test Data", "desc" => "Archive Test Data 1", "objet"=>"Demande de proces test1", "date_emission"=>"2024-05-01","date_reception"=>"2024-05-02","date"=>"2024-02-05","ampillation"=>"Data test 1","type_fichier"=>0,"fichier"=>"public/archives/cS8bDs7GitDZuOTvClBEFKSpqJ2ZsrUj95Cfj8SI.docx","gestionaire_id"=>142,"emeteur_id"=>145,"destinataire_id"=>146,"receveur_id"=>149,"type_id"=>117,"categorie_id"=>135,"poste_id"=>153,"user_id"=>1],
        ]);
    }
}
