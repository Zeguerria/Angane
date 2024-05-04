<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("parametres")->insert([
            ["id"=> 1, "code" => "Aucun",  "libelle" => "Aucun", "desc" => "", "parent_id" => 1, "type_parametre_id" => 1],

            ["id"=> 2, "code" => "M",  "libelle" => "Masculin", "desc" => "", "parent_id" => 1, "type_parametre_id" => 7],
            ["id"=> 3, "code" => "F",  "libelle" => "Féminin", "desc" => "", "parent_id" => 1, "type_parametre_id" => 7],
            // les provinces
			["id"=> 9, "code" => "G1",  "libelle" => "ESTUAIRE", "desc" => "", "parent_id" => 1, "type_parametre_id" => 2],
			["id"=> 10, "code" => "G2",  "libelle" => "HAUT-OGOOUE", "desc" => "", "parent_id" => 1, "type_parametre_id" => 2],
			["id"=> 11, "code" => "G3",  "libelle" => "MOYEN OGOOUE", "desc" => "", "parent_id" => 1, "type_parametre_id" => 2],
			["id"=> 12, "code" => "G4",  "libelle" => "NGOUNIE", "desc" => "", "parent_id" => 1, "type_parametre_id" => 2],
			["id"=> 13, "code" => "G5",  "libelle" => "NYANGA", "desc" => "", "parent_id" => 1, "type_parametre_id" => 2],
			["id"=> 14, "code" => "G6",  "libelle" => "OGOOUE IVINDO", "desc" => "", "parent_id" => 1, "type_parametre_id" => 2],
			["id"=> 15, "code" => "G7",  "libelle" => "OGOOUE LOLO", "desc" => "", "parent_id" => 1, "type_parametre_id" => 2],
			["id"=> 16, "code" => "G8",  "libelle" => "OGOOUE MARITIME", "desc" => "", "parent_id" => 1, "type_parametre_id" => 2],
			["id"=> 17, "code" => "G9",  "libelle" => "WOLEU NTEM", "desc" => "", "parent_id" => 1, "type_parametre_id" => 2],
			// les arrondissements
            // TRAVAIL DE GRAND EDOU DEBUT
                // ["id"=> 18, "code" => "ARR1",  "libelle" => "1ER ARRONDISSEMENT", "desc" => "", "parent_id" => 1, "type_parametre_id" => 4],
			    // ["id"=> 19, "code" => "ARR2",  "libelle" => "2EME ARRONDISSEMENT", "desc" => "", "parent_id" => 1, "type_parametre_id" => 4],
			    // ["id"=> 20, "code" => "ARR3",  "libelle" => "3EME ARRONDISSEMENT", "desc" => "", "parent_id" => 1, "type_parametre_id" => 4],
			    // ["id"=> 21, "code" => "ARR4",  "libelle" => "4EME ARRONDISSEMENT", "desc" => "", "parent_id" => 1, "type_parametre_id" => 4],
			    // ["id"=> 22, "code" => "ARR5",  "libelle" => "5EME ARRONDISSEMENT", "desc" => "", "parent_id" => 1, "type_parametre_id" => 4],
			    // ["id"=> 23, "code" => "ARR6",  "libelle" => "6EME ARRONDISSEMENT", "desc" => "", "parent_id" => 1, "type_parametre_id" => 4],
            // TRAVAIL DE GRAND EDOU FIN
            // MES MODIFICATION DEBUT
                ["id"=> 18, "code" => "ARR1",  "libelle" => "1ER ARRONDISSEMENT", "desc" => "", "parent_id" => 103, "type_parametre_id" => 4],
                ["id"=> 19, "code" => "ARR2",  "libelle" => "2EME ARRONDISSEMENT", "desc" => "", "parent_id" => 103, "type_parametre_id" => 4],
                ["id"=> 20, "code" => "ARR3",  "libelle" => "3EME ARRONDISSEMENT", "desc" => "", "parent_id" => 103, "type_parametre_id" => 4],
                ["id"=> 21, "code" => "ARR4",  "libelle" => "4EME ARRONDISSEMENT", "desc" => "", "parent_id" => 103, "type_parametre_id" => 4],
                ["id"=> 22, "code" => "ARR5",  "libelle" => "5EME ARRONDISSEMENT", "desc" => "", "parent_id" => 103, "type_parametre_id" => 4],
                ["id"=> 23, "code" => "ARR6",  "libelle" => "6EME ARRONDISSEMENT", "desc" => "", "parent_id" => 103, "type_parametre_id" => 4],
            // MES MODIFICATION FIN
			// communes des provinces
			["id"=> 24, "code" => "LBV",  "libelle" => "LIBREVILLE", "desc" => "", "parent_id" => 9, "type_parametre_id" => 3],
			["id"=> 25, "code" => "KGO",  "libelle" => "KANGO", "desc" => "", "parent_id" => 9, "type_parametre_id" => 3],
			["id"=> 26, "code" => "NTM",  "libelle" => "NTOUM", "desc" => "", "parent_id" => 9, "type_parametre_id" => 3],
			["id"=> 27, "code" => "NKAN",  "libelle" => "NKAN", "desc" => "", "parent_id" => 9, "type_parametre_id" => 3],
			["id"=> 28, "code" => "CCB",  "libelle" => "COCOBEACH", "desc" => "", "parent_id" => 9, "type_parametre_id" => 3],
			["id"=> 29, "code" => "FCV",  "libelle" => "FRANCEVILLE", "desc" => "", "parent_id" => 10, "type_parametre_id" => 3],
			["id"=> 30, "code" => "MDA",  "libelle" => "MOANDA", "desc" => "", "parent_id" => 10, "type_parametre_id" => 3],
			["id"=> 31, "code" => "MOUN",  "libelle" => "MOUNANA", "desc" => "", "parent_id" => 10, "type_parametre_id" => 3],
			["id"=> 32, "code" => "LEKON",  "libelle" => "LEKONI", "desc" => "", "parent_id" => 10, "type_parametre_id" => 3],
			["id"=> 33, "code" => "OKOND",  "libelle" => "OKONDJA", "desc" => "", "parent_id" => 10, "type_parametre_id" => 3],
			["id"=> 34, "code" => "NDJO",  "libelle" => "NDJOLE", "desc" => "", "parent_id" => 11, "type_parametre_id" => 3],
			["id"=> 35, "code" => "LBRN",  "libelle" => "LAMBARENE", "desc" => "", "parent_id" => 11, "type_parametre_id" => 3],
			["id"=> 36, "code" => "MOUIL",  "libelle" => "MOUILA", "desc" => "", "parent_id" => 12, "type_parametre_id" => 3],
			["id"=> 37, "code" => "FOUG",  "libelle" => "FOUGAMOU", "desc" => "", "parent_id" => 12, "type_parametre_id" => 3],
			["id"=> 38, "code" => "NDEN",  "libelle" => "NDENDE", "desc" => "", "parent_id" => 12, "type_parametre_id" => 3],
			["id"=> 39, "code" => "MBIG",  "libelle" => "MBIGOU", "desc" => "", "parent_id" => 12, "type_parametre_id" => 3],
			["id"=> 40, "code" => "MIMG",  "libelle" => "MIMONGO", "desc" => "", "parent_id" => 12, "type_parametre_id" => 3],
			["id"=> 41, "code" => "TCHIB",  "libelle" => "TCHIBANGA", "desc" => "", "parent_id" => 13, "type_parametre_id" => 3],
			["id"=> 42, "code" => "MAYU",  "libelle" => "MAYUMBA", "desc" => "", "parent_id" => 13, "type_parametre_id" => 3],
			["id"=> 43, "code" => "TSOG",  "libelle" => "TSOGNI", "desc" => "", "parent_id" => 13, "type_parametre_id" => 3],
			["id"=> 44, "code" => "MKK",  "libelle" => "MAKOKOU", "desc" => "", "parent_id" => 14, "type_parametre_id" => 3],
			["id"=> 45, "code" => "BOOUE",  "libelle" => "BOOUE", "desc" => "", "parent_id" => 14, "type_parametre_id" => 3],
			["id"=> 46, "code" => "MEKB",  "libelle" => "MEKAMBO", "desc" => "", "parent_id" => 14, "type_parametre_id" => 3],
			["id"=> 47, "code" => "KLMT",  "libelle" => "KOULAMOUTOU", "desc" => "", "parent_id" => 15, "type_parametre_id" => 3],
			["id"=> 48, "code" => "LSTV",  "libelle" => "LASTOURSVILLE", "desc" => "", "parent_id" => 15, "type_parametre_id" => 3],
			["id"=> 49, "code" => "PORG",  "libelle" => "PORT-GENTIL", "desc" => "", "parent_id" => 16, "type_parametre_id" => 3],
			["id"=> 50, "code" => "OMB",  "libelle" => "OMBOUE", "desc" => "", "parent_id" => 16, "type_parametre_id" => 3],
			["id"=> 51, "code" => "GAMB",  "libelle" => "GAMBA", "desc" => "", "parent_id" => 16, "type_parametre_id" => 3],
			["id"=> 52, "code" => "OY",  "libelle" => "OYEM", "desc" => "", "parent_id" => 17, "type_parametre_id" => 3],
			["id"=> 53, "code" => "BT",  "libelle" => "BITAM", "desc" => "", "parent_id" => 17, "type_parametre_id" => 3],
			["id"=> 54, "code" => "MVL",  "libelle" => "MINVOUL", "desc" => "", "parent_id" => 17, "type_parametre_id" => 3],
			["id"=> 55, "code" => "MTZ",  "libelle" => "MITZIC", "desc" => "", "parent_id" => 17, "type_parametre_id" => 3],
			["id"=> 56, "code" => "MDNEU",  "libelle" => "MEDOUNEU", "desc" => "", "parent_id" => 17, "type_parametre_id" => 3],
			// quartiers de libreville
			["id"=> 57, "code" => "PK5",  "libelle" => "PK5", "desc" => "", "parent_id" => 164, "type_parametre_id" => 5],
			["id"=> 58, "code" => "PK6",  "libelle" => "PK6", "desc" => "", "parent_id" => 164, "type_parametre_id" => 5],
			["id"=> 59, "code" => "PK7",  "libelle" => "PK7", "desc" => "", "parent_id" => 164, "type_parametre_id" => 5],
			["id"=> 60, "code" => "PK8",  "libelle" => "PK8", "desc" => "", "parent_id" => 164, "type_parametre_id" => 5],
			["id"=> 61, "code" => "PK9",  "libelle" => "PK9", "desc" => "", "parent_id" => 168, "type_parametre_id" => 5],
			["id"=> 62, "code" => "PK10",  "libelle" => "PK10", "desc" => "", "parent_id" => 168, "type_parametre_id" => 5],
			["id"=> 63, "code" => "PK11",  "libelle" => "PK11", "desc" => "", "parent_id" => 167, "type_parametre_id" => 5],
			["id"=> 64, "code" => "PK12",  "libelle" => "PK12", "desc" => "", "parent_id" => 167, "type_parametre_id" => 5],
			["id"=> 65, "code" => "NDZENG",  "libelle" => "NDZENG AYONG", "desc" => "", "parent_id" => 168, "type_parametre_id" => 5],
			["id"=> 66, "code" => "CHARBO",  "libelle" => "CHARBONNAGE", "desc" => "", "parent_id" => 163, "type_parametre_id" => 5],
			["id"=> 67, "code" => "RIO",  "libelle" => "RIO", "desc" => "", "parent_id" => 164, "type_parametre_id" => 5],
			["id"=> 68, "code" => "NKEM",  "libelle" => "NKEMBO", "desc" => "", "parent_id" => 164, "type_parametre_id" => 5],
			["id"=> 69, "code" => "AVEA",  "libelle" => "AVEA", "desc" => "", "parent_id" => 164, "type_parametre_id" => 5],
			["id"=> 70, "code" => "GARE",  "libelle" => "GAROUTIERE", "desc" => "", "parent_id" => 164, "type_parametre_id" => 5],
			["id"=> 71, "code" => "BELV1",  "libelle" => "BELLE VUE 1", "desc" => "", "parent_id" => 165, "type_parametre_id" => 5],
			["id"=> 72, "code" => "BELV2",  "libelle" => "BELLE VUE 2", "desc" => "", "parent_id" => 165, "type_parametre_id" => 5],
			["id"=> 73, "code" => "IAI",  "libelle" => "IAI", "desc" => "", "parent_id" => 167, "type_parametre_id" => 5],
			["id"=> 74, "code" => "ACAE",  "libelle" => "ACAE", "desc" => "", "parent_id" => 167, "type_parametre_id" => 5],
			["id"=> 75, "code" => "MIND1",  "libelle" => "MINDOUBE 1", "desc" => "", "parent_id" => 167, "type_parametre_id" => 5],
			["id"=> 76, "code" => "MIND2",  "libelle" => "MINDOUBE 2", "desc" => "", "parent_id" => 167, "type_parametre_id" => 5],
			["id"=> 77, "code" => "AWEN",  "libelle" => "AWENDJE", "desc" => "", "parent_id" => 165, "type_parametre_id" => 5],
			["id"=> 78, "code" => "BLVD",  "libelle" => "BOULEVARD", "desc" => "", "parent_id" => 165, "type_parametre_id" => 5],
			["id"=> 79, "code" => "BPEINT",  "libelle" => "BELLE PEINTURE", "desc" => "", "parent_id" => 165, "type_parametre_id" => 5],
			["id"=> 80, "code" => "GARE",  "libelle" => "GAROUTIERE", "desc" => "", "parent_id" => 164, "type_parametre_id" => 5],

			["id"=> 81, "code" => "OWD",  "libelle" => "OWENDO", "desc" => "", "parent_id" => 9, "type_parametre_id" => 3],
			// quartiers d'owendo
			["id"=> 82, "code" => "PET",  "libelle" => "PETRO", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 83, "code" => "DPED",  "libelle" => "DERRIERE PEDIATRIE", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 84, "code" => "RAZ",  "libelle" => "RAZEL", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 85, "code" => "CSNI",  "libelle" => "CARREFOUR SNI", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 86, "code" => "SNI",  "libelle" => "LA SNI", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 87, "code" => "BARAK",  "libelle" => "BARAKOUDA", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 88, "code" => "PVIL",  "libelle" => "PETIT VILLAGE", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 89, "code" => "SETRAG",  "libelle" => "LA STATION SETRAG", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 90, "code" => "ESCARP",  "libelle" => "ESCARPE", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 91, "code" => "POSTE",  "libelle" => "LA POSTE", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 92, "code" => "BAN",  "libelle" => "BANANIER", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 93, "code" => "CAWOUNG",  "libelle" => "CARREFOUR AWOUNGOU", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 94, "code" => "AWGOU",  "libelle" => "AWOUNGOUE", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 95, "code" => "LYCEE",  "libelle" => "LYCEE TECHNIQUE", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 96, "code" => "AKNAM1",  "libelle" => "AKOURNAM 1", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 97, "code" => "AKNAM2",  "libelle" => "AKOURNAM 2", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 98, "code" => "ROUG",  "libelle" => "ROUGIER", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 99, "code" => "SEEG",  "libelle" => "SEEG", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 100, "code" => "VBAK",  "libelle" => "VILLAGE BAKOTA", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 101, "code" => "ALENA",  "libelle" => "ALENAKIRI", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],
			["id"=> 102, "code" => "PORT",  "libelle" => "PORT OWENDO", "desc" => "", "parent_id" => 81, "type_parametre_id" => 5],

			["id"=> 103, "code" => "AKD",  "libelle" => "AKANDA", "desc" => "", "parent_id" => 9, "type_parametre_id" => 3],
			// quartiers d'akanda
			["id"=> 104, "code" => "OKAL",  "libelle" => "OKALA", "desc" => "", "parent_id" => 103, "type_parametre_id" => 5],
			["id"=> 105, "code" => "JIJI",  "libelle" => "JIJI", "desc" => "", "parent_id" => 103, "type_parametre_id" => 5],
			["id"=> 106, "code" => "ANGO",  "libelle" => "ANGODJE", "desc" => "", "parent_id" => 103, "type_parametre_id" => 5],
			["id"=> 107, "code" => "CHAT",  "libelle" => "CHATEAU", "desc" => "", "parent_id" => 103, "type_parametre_id" => 5],
			["id"=> 108, "code" => "OCARAV",  "libelle" => "AU CAP CARAVANE", "desc" => "", "parent_id" => 103, "type_parametre_id" => 5],
			["id"=> 109, "code" => "C-AILE",  "libelle" => "CITE DES AILES", "desc" => "", "parent_id" => 103, "type_parametre_id" => 5],

            // les postes
			["id"=> 110, "code" => "DGCPT",  "libelle" => "Direction Générale", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 111, "code" => "DSI",  "libelle" => "Direction des Systèmes d'Information", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 112, "code" => "DD",  "libelle" => "Direction des Règlements", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 113, "code" => "DR",  "libelle" => "Direction des Règlements", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],

            // les statuts
			["id"=> 114, "code" => "ACTIF",  "libelle" => "Actif", "desc" => "", "parent_id" => 1, "type_parametre_id" => 8],
			["id"=> 115, "code" => "INACTIF",  "libelle" => "Inactif", "desc" => "", "parent_id" => 1, "type_parametre_id" => 8],

            // les types
			["id"=> 116, "code" => "ENTRANT",  "libelle" => "Document Entrant", "desc" => "", "parent_id" => 1, "type_parametre_id" => 10],
			["id"=> 117, "code" => "SORTANT",  "libelle" => "Document Sortant", "desc" => "", "parent_id" => 1, "type_parametre_id" => 10],

            // les pays
			["id"=> 118, "code" => "GABON",  "libelle" => "GABON", "desc" => "", "parent_id" => 1, "type_parametre_id" => 11],
			["id"=> 119, "code" => "CAMEROUN",  "libelle" => "CAMEROUN", "desc" => "", "parent_id" => 1, "type_parametre_id" => 11],
			["id"=> 120, "code" => "TCHAD",  "libelle" => "TCHAD", "desc" => "", "parent_id" => 1, "type_parametre_id" => 11],
			["id"=> 121, "code" => "SENEGAL",  "libelle" => "SENEGAL", "desc" => "", "parent_id" => 1, "type_parametre_id" => 11],
			["id"=> 122, "code" => "GUINEE-EQ",  "libelle" => "GUINEE EQUATORIALE", "desc" => "", "parent_id" => 1, "type_parametre_id" => 11],
			["id"=> 123, "code" => "CONGO B",  "libelle" => "CONGO BRAZAVILLE", "desc" => "", "parent_id" => 1, "type_parametre_id" => 11],
			["id"=> 124, "code" => "RDC",  "libelle" => "REPUBLIQUE DEMOCRATIQUE DU CONGO", "desc" => "", "parent_id" => 1, "type_parametre_id" => 11],

            // les profil
			["id"=> 131, "code" => "ADMIN", "libelle" => "Administrateur", "desc" => "", "parent_id" => 1, "type_parametre_id" => 13],
			["id"=> 132, "code" => "AGENT", "libelle" => "Agent", "desc" => "", "parent_id" => 1, "type_parametre_id" => 13],

            // les habillitations
			["id"=> 133, "code" => "ACCUEIL", "libelle" => "Accueil", "desc" => "", "parent_id" => 1, "type_parametre_id" => 14],
			["id"=> 134, "code" => "PARAMETRES", "libelle" => "Parametres", "desc" => "", "parent_id" => 1, "type_parametre_id" => 14],


            // les CATEGORIE
			["id"=> 135, "code" => "Lettre", "libelle" => "lettre", "desc" => "", "parent_id" => 1, "type_parametre_id" => 15],
			["id"=> 136, "code" => "DOC-ADMIN", "libelle" => "Document Administratif", "desc" => "", "parent_id" => 1, "type_parametre_id" => 15],
			["id"=> 137, "code" => "Facture", "libelle" => "Facture", "desc" => "", "parent_id" => 1, "type_parametre_id" => 15],
			["id"=> 138, "code" => "Devis", "libelle" => "Devis", "desc" => "", "parent_id" => 1, "type_parametre_id" => 15],
			["id"=> 139, "code" => "BC", "libelle" => "Bon de commande", "desc" => "", "parent_id" => 1, "type_parametre_id" => 15],
			["id"=> 140, "code" => "BL", "libelle" => "Bon de livraison", "desc" => "", "parent_id" => 1, "type_parametre_id" => 15],
			["id"=> 141, "code" => "Note", "libelle" => "Note de service", "desc" => "", "parent_id" => 1, "type_parametre_id" => 15],

            // les gestionnaires
            ["id"=> 142, "code" => "2023 - ....", "libelle" => "M. Luther Steeven ABOUNA YANGUI", "desc" => "", "parent_id" => 1, "type_parametre_id" => 16],

            // les EMETTEURS
            ["id"=> 143, "code" => "DGCPT", "libelle" => "Direction Générale", "desc" => "", "parent_id" => 1, "type_parametre_id" => 17],
            ["id"=> 144, "code" => "DRH", "libelle" => "Direction des Ressources Humaines", "desc" => "", "parent_id" => 1, "type_parametre_id" => 17],
            ["id"=> 145, "code" => "DAF", "libelle" => "Direction des Affaires Financières", "desc" => "", "parent_id" => 1, "type_parametre_id" => 17],


            // les DESTINATAIRE
            ["id"=> 146, "code" => "DGCPT", "libelle" => "Direction Générale", "desc" => "", "parent_id" => 1, "type_parametre_id" => 18],
            ["id"=> 147, "code" => "DRH", "libelle" => "Direction des Ressources Humaines", "desc" => "", "parent_id" => 1, "type_parametre_id" => 18],
            ["id"=> 148, "code" => "DAF", "libelle" => "Direction des Affaires Financières", "desc" => "", "parent_id" => 1, "type_parametre_id" => 18],

            // les RECEVEURS
            ["id"=> 149, "code" => "SCR", "libelle" => "Reception Centrale", "desc" => "", "parent_id" => 1, "type_parametre_id" => 19],
            ["id"=> 150, "code" => "SCDG", "libelle" => "Secrétariat du DG", "desc" => "", "parent_id" => 1, "type_parametre_id" => 19],



			["id"=> 151, "code" => "DRH",  "libelle" => "Direction des Ressources Humaines", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 152, "code" => "DPM",  "libelle" => "Direction du Patrimoine et des Moyens", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 153, "code" => "DCPC",  "libelle" => "Direction de la Centralisation de la Production Comptable", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 154, "code" => "DER",  "libelle" => "Direction des Etudes er de la Règlementation", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 155, "code" => "TC",  "libelle" => "Trésorerie Centrale", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 156, "code" => "ACC",  "libelle" => "Agence Comptable Centrale", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 157, "code" => "CFDT",  "libelle" => "Centre de Formation et de Documentation du Trésor", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 158, "code" => "SRP",  "libelle" => "Service Accueil et Relations Publiques", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 159, "code" => "SC",  "libelle" => "Service Courrier", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 160, "code" => "SDGCPT",  "libelle" => "Secrétariat du DGCPT", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 161, "code" => "SPDGCPT",  "libelle" => "Secrétariat Particulier du DGCPT", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
			["id"=> 162, "code" => "CSPDGCPT",  "libelle" => "Cabinet du DGCPT", "desc" => "", "parent_id" => 1, "type_parametre_id" => 9],
            // ARRONDISSEMENT DE LIBREVILLE DEBUT
			    ["id"=> 163, "code" => "ARR1-L",  "libelle" => "1ER ARRONNDISSENT", "desc" => "Arrondissement de Libreville", "parent_id" => 24, "type_parametre_id" => 4],
			    ["id"=> 164, "code" => "ARR2-L",  "libelle" => "2EME ARRONNDISSENT", "desc" => "Arrondissement de Libreville", "parent_id" => 24, "type_parametre_id" => 4],
			    ["id"=> 165, "code" => "ARR3-L",  "libelle" => "3EME ARRONNDISSENT", "desc" => "Arrondissement de Libreville", "parent_id" => 24, "type_parametre_id" => 4],
			    ["id"=> 166, "code" => "ARR4-L",  "libelle" => "4EME ARRONNDISSENT", "desc" => "Arrondissement de Libreville", "parent_id" => 24, "type_parametre_id" => 4],
			    ["id"=> 167, "code" => "ARR5-L",  "libelle" => "5EME ARRONNDISSENT", "desc" => "Arrondissement de Libreville", "parent_id" => 24, "type_parametre_id" => 4],
			    ["id"=> 168, "code" => "ARR6-L",  "libelle" => "6EME ARRONNDISSENT", "desc" => "Arrondissement de Libreville", "parent_id" => 24, "type_parametre_id" => 4],
            // ARRONDISSEMENT DE LIBREVILLE FIN

        ]);
    }
}
