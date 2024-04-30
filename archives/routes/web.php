<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', 'App\Http\Controllers\ArchiveController@stats');

    Route::get('/dashboard', 'App\Http\Controllers\ArchiveController@stats')->name('dashboard');

    // archivage des données

    Route::get('/Archiver','App\Http\Controllers\ArchiveController@ajouter')->name('Archiver');
    Route::post('ajouterArchive','App\Http\Controllers\ArchiveController@store')->name('ajouterArchive');

    Route::post('recherche_archive','App\Http\Controllers\ArchiveController@recherche_archive')->name('recherche_archive');
    Route::get('/Liste-Archivage','App\Http\Controllers\ArchiveController@index')->name('Liste des Archive');
    Route::get('/Liste-Archivage','App\Http\Controllers\ArchiveController@index')->name('Liste des Archive');
    Route::get('/Details-Archivage/{id}','App\Http\Controllers\ArchiveController@details')->name('Details Archive');


    Route::get('/Modifier-Archivage/{id}','App\Http\Controllers\ArchiveController@edit')->name('Modifier Archive');
    Route::post('modifierArchive','App\Http\Controllers\ArchiveController@update')->name('modifierArchive');


    Route::get('/Stat-Archive','App\Http\Controllers\ArchiveController@stats')->name('Stats Archive');


    Route::get('/Supprimer-Archivage/{id}','App\Http\Controllers\ArchiveController@supprimer')->name('Supprimer Archive');
    Route::post('supprimerArchive','App\Http\Controllers\ArchiveController@softdelete')->name('supprimerArchive');

    // gestion des parametres debut

        Route::get('/Parametres','App\Http\Controllers\ParametreController@index')->name('Parametres');
        Route::get('/Ajouter-Parametre','App\Http\Controllers\ParametreController@ajouter')->name('Ajouter un parametre');
        Route::post('ajouterParametre','App\Http\Controllers\ParametreController@store')->name('ajouterParametre');
        Route::get('/Details-Parametre/{id}','App\Http\Controllers\ParametreController@details')->name('Details parametre');
        Route::get('/Modifier-Parametre/{id}','App\Http\Controllers\ParametreController@modifier')->name('Modifier Parametre');
        Route::post('modifierParametre','App\Http\Controllers\ParametreController@update')->name('modifierParametre');
        Route::get('/Supprimer-Parametre/{id}','App\Http\Controllers\ParametreController@supprimer')->name('Supprimer Parametre');
        Route::post('supprimerParametre','App\Http\Controllers\ParametreController@destroy')->name('supprimerParametre');
        // mon ajout parametre debut
            Route::get('ParametreCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeille');
            Route::post('corbeilleparametre', 'App\Http\Controllers\ParametreController@corbeille')->name('corbeilleParametre');
            Route::post('recupparametre', 'App\Http\Controllers\ParametreController@recupUnCorbeille')->name('recupParametre');
            Route::get('deleteAllparametre', 'App\Http\Controllers\ParametreController@destroyTous')->name('deleteAllparametre');
            Route::get('corbeilleAllparametre', 'App\Http\Controllers\ParametreController@corbeille_all')->name('corbeilleAllparametre');
            Route::get('recupAllparametre', 'App\Http\Controllers\ParametreController@recupTousCorbeille')->name('recupAllparametre');
        // mon ajout parametre fin
    //gestion des parametres fin
    // gestion des parametres ID
        Route::get('/Parametres/{id}','App\Http\Controllers\ParametreIdController@index')->name('Parametres ID');
        Route::get('/Ajouter-Parametre/{id}','App\Http\Controllers\ParametreIdController@ajouter')->name('Ajouter un parametre');
        Route::post('ajouterParametreID','App\Http\Controllers\ParametreIdController@store')->name('ajouterParametreID');
        Route::get('/Details-Parametre/ID/{id}','App\Http\Controllers\ParametreIdController@details')->name('Details parametre');
        Route::get('/Modifier-Parametre/ID/{id}','App\Http\Controllers\ParametreIdController@modifier')->name('Modifier Parametre');
        Route::post('modifierParametreID','App\Http\Controllers\ParametreIdController@update')->name('modifierParametreID');
        Route::get('/Supprimer-Parametre/ID/{id}','App\Http\Controllers\ParametreIdController@supprimer')->name('Supprimer Parametre');
        Route::post('supprimerParametreID','App\Http\Controllers\ParametreIdController@destroy')->name('supprimerParametreID');


    // gestion des types parametres

            Route::get('/Types-Parametres','App\Http\Controllers\TypeParametreController@index')->name('Types-Parametres');
            Route::get('/Ajouter-Types-Parametre','App\Http\Controllers\TypeParametreController@ajouter')->name('Ajouter  Type parametre');
            Route::post('ajouterTypeParametre','App\Http\Controllers\TypeParametreController@store')->name('ajouterTypeParametre');
            Route::get('/Details-Types-Parametre/{id}','App\Http\Controllers\TypeParametreController@details')->name('Details Type parametre');
            Route::get('/Modifier-Types-Parametre/{id}','App\Http\Controllers\TypeParametreController@modifier')->name('Modifier Type Parametre');
            Route::post('modifierTypeParametre','App\Http\Controllers\TypeParametreController@update')->name('modifierTypeParametre');
            Route::get('/Supprimer-Types-Parametre/{id}','App\Http\Controllers\TypeParametreController@supprimer')->name('Supprimer Type Parametre');
            Route::post('supprimerTypeParametre','App\Http\Controllers\TypeParametreController@destroy')->name('supprimerTypeParametre');
            // mon ajout debut
                Route::get('Types-Parametres-Corbeille', 'App\Http\Controllers\TypeParametreController@indexCorbeille');
                Route::post('corbeilletypeparametre', 'App\Http\Controllers\TypeParametreController@corbeille')->name('corbeilleTypeDeParametre');
                Route::post('recuptypeparametre', 'App\Http\Controllers\TypeParametreController@recupUnCorbeille')->name('recupTypeDeParametre');
                Route::get('deleteAlltypeparametre', 'App\Http\Controllers\TypeParametreController@destroyTous')->name('deleteAlltypeparametre');
                Route::get('corbeilleAlltypeparametre', 'App\Http\Controllers\TypeParametreController@corbeille_all')->name('corbeilleAlltypeparametre');
                Route::get('recupAlltypeparametre', 'App\Http\Controllers\TypeParametreController@recupTousCorbeille')->name('recupAlltypeparametre');
            // mon ajout fin
    // gestion des types de parametres fin
    // GESTION DES PROVINCES DEBUT
        // ROUTES DEBUTS
            Route::get('/Provinces','App\Http\Controllers\ParametreController@indexProvince')->name('Provinces');
            Route::get('ProvinceCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleProvince');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreProvince','App\Http\Controllers\ParametreController@storeProvince')->name('ajouterParametreProvince');
            Route::post('modifierParametreProvince','App\Http\Controllers\ParametreController@updateProvince')->name('modifierParametreProvince');
            Route::post('supprimerParametreProvince','App\Http\Controllers\ParametreController@destroyProvince')->name('supprimerParametreProvince');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreProvince', 'App\Http\Controllers\ParametreController@corbeilleProvince')->name('corbeilleParametreProvince');
            Route::post('recupParametreProvince', 'App\Http\Controllers\ParametreController@recupUnCorbeilleProvince')->name('recupParametreProvince');
            Route::get('deleteAllprovince', 'App\Http\Controllers\ParametreController@destroyTousProvince')->name('deleteAllprovince');
            Route::get('corbeilleAllprovince', 'App\Http\Controllers\ParametreController@corbeille_allProvince')->name('corbeilleAllprovince');
            Route::get('recupAllprovince', 'App\Http\Controllers\ParametreController@recupTousCorbeilleProvince')->name('recupAlprovince');
        // AUTRES FIN
    // GESTION DES PROVINCES FIN

    // GESTION DES COMMUNES DEBUT
        // ROUTES DEBUT
            Route::get('/Communes','App\Http\Controllers\ParametreController@indexCommune')->name('Communes');
            Route::get('CommuneCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleCommune');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreCommune','App\Http\Controllers\ParametreController@storeCommune')->name('ajouterParametreCommune');
            Route::post('modifierParametreCommune','App\Http\Controllers\ParametreController@updateCommune')->name('modifierParametreCommune');
            Route::post('supprimerParametreCommune','App\Http\Controllers\ParametreController@destroyCommune')->name('supprimerParametreCommune');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreCommune', 'App\Http\Controllers\ParametreController@corbeilleCommune')->name('corbeilleParametreCommune');
            Route::post('recupParametreCommune', 'App\Http\Controllers\ParametreController@recupUnCorbeilleCommune')->name('recupParametreCommune');
            Route::get('deleteAllcommune', 'App\Http\Controllers\ParametreController@destroyTousCommune')->name('deleteAllcommune');
            Route::get('corbeilleAllcommune', 'App\Http\Controllers\ParametreController@corbeille_allCommune')->name('corbeilleAllcommune');
            Route::get('recupAllcommune', 'App\Http\Controllers\ParametreController@recupTousCorbeilleCommunes')->name('recupAlcommune');
        // AUTRES FIN
    // GESTION DES COMMUNES FIN
    // GESTION DES ARRONDISSEMENTS DEBUT
        // ROUTES DEBUT
            Route::get('/Arrondissements','App\Http\Controllers\ParametreController@indexArrondissement')->name('Arrondissements');
            Route::get('ArrondissementCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleArrondissement')->name('ArrondissementCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreArrondissement','App\Http\Controllers\ParametreController@storeArrondissement')->name('ajouterParametreArrondissement');
            Route::post('modifierParametreArrondissement','App\Http\Controllers\ParametreController@updateArrondissement')->name('modifierParametreArrondissement');
            Route::post('supprimerParametreArrondissement','App\Http\Controllers\ParametreController@destroyArrondissement')->name('supprimerParametreArrondissement');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreArrondissement', 'App\Http\Controllers\ParametreController@corbeilleArrondissement')->name('corbeilleParametreArrondissement');
            Route::post('recupParametreArrondissement', 'App\Http\Controllers\ParametreController@recupUnCorbeilleArrondissement')->name('recupParametreArrondissement');
            Route::get('deleteAllarrondissement', 'App\Http\Controllers\ParametreController@destroyTousArrondissement')->name('deleteAllarrondissement');
            Route::get('corbeilleAllarrondissement', 'App\Http\Controllers\ParametreController@corbeille_allArrondissement')->name('corbeilleAllarrondissement');
            Route::get('recupAllarrondissement', 'App\Http\Controllers\ParametreController@recupTousCorbeilleArrondissements')->name('recupAlarrondissement');
        // AUTRES FIN
    // GESTION DES ARRONDISSEMENTS FIN
    // GESTION DES QUARTIERS DEBUT
        // ROUTES DEBUT
            Route::get('/Quartiers','App\Http\Controllers\ParametreController@indexQuartier')->name('Quartiers');
            Route::get('QuartierCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleQuartier')->name('QuartierCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreQuartier','App\Http\Controllers\ParametreController@storeQuartier')->name('ajouterParametreQuartier');
            Route::post('modifierParametreQuartier','App\Http\Controllers\ParametreController@updateQuartier')->name('modifierParametreQuartier');
            Route::post('supprimerParametreQuartier','App\Http\Controllers\ParametreController@destroyQuartier')->name('supprimerParametreQuartier');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreQuartier', 'App\Http\Controllers\ParametreController@corbeilleQuartier')->name('corbeilleParametreQuartier');
            Route::post('recupParametreQuartier', 'App\Http\Controllers\ParametreController@recupUnCorbeilleQuartier')->name('recupParametreQuartier');
            Route::get('deleteAllquartier', 'App\Http\Controllers\ParametreController@destroyTousQuartier')->name('deleteAllquartier');
            Route::get('corbeilleAllquartier', 'App\Http\Controllers\ParametreController@corbeille_allQuartier')->name('corbeilleAllquartier');
            Route::get('recupAllquartier', 'App\Http\Controllers\ParametreController@recupTousCorbeilleQuartier')->name('recupAlquartier');
        // AUTRES FIN
    // GESTION DES QUARTIERS FIN
    // GESTTION DES POSTES DEBUT
        // ROUTES DEBUT
            Route::get('/Postes','App\Http\Controllers\ParametreController@indexPoste')->name('Postes');
            Route::get('PosteCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeillePoste')->name('PosteCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametrePoste','App\Http\Controllers\ParametreController@storePoste')->name('ajouterParametrePoste');
            Route::post('modifierParametrePoste','App\Http\Controllers\ParametreController@updatePoste')->name('modifierParametrePoste');
            Route::post('supprimerParametrePoste','App\Http\Controllers\ParametreController@destroyPoste')->name('supprimerParametrePoste');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametrePoste', 'App\Http\Controllers\ParametreController@corbeillePoste')->name('corbeilleParametrePoste');
            Route::post('recupParametrePoste', 'App\Http\Controllers\ParametreController@recupUnCorbeillePoste')->name('recupParametrePoste');
            Route::get('deleteAllposte', 'App\Http\Controllers\ParametreController@destroyTousPoste')->name('deleteAllposte');
            Route::get('corbeilleAllposte', 'App\Http\Controllers\ParametreController@corbeille_allPoste')->name('corbeilleAllposte');
            Route::get('recupAllposte', 'App\Http\Controllers\ParametreController@recupTousCorbeillePoste')->name('recupAlposte');
        // AUTRES FIN
    // GESTTION DES POSTES FIN
    // GESTTION DES STATUTS DEBUT
        // ROUTES DEBUT
            Route::get('/Statuts','App\Http\Controllers\ParametreController@indexStatut')->name('Statuts');
            Route::get('StatutCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleStatut')->name('StatutCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreStatut','App\Http\Controllers\ParametreController@storeStatut')->name('ajouterParametreStatut');
            Route::post('modifierParametreStatut','App\Http\Controllers\ParametreController@updateStatut')->name('modifierParametreStatut');
            Route::post('supprimerParametreStatut','App\Http\Controllers\ParametreController@destroyStatut')->name('supprimerParametreStatut');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreStatut', 'App\Http\Controllers\ParametreController@corbeilleStatut')->name('corbeilleParametreStatut');
            Route::post('recupParametreStatut', 'App\Http\Controllers\ParametreController@recupUnCorbeilleStatut')->name('recupParametreStatut');
            Route::get('deleteAllstatut', 'App\Http\Controllers\ParametreController@destroyTousStatut')->name('deleteAllstatut');
            Route::get('corbeilleAllstatut', 'App\Http\Controllers\ParametreController@corbeille_allStatut')->name('corbeilleAllstatut');
            Route::get('recupAllstatut', 'App\Http\Controllers\ParametreController@recupTousCorbeilleStatut')->name('recupAllstatut');
        // AUTRES FIN
    // GESTTION DES STATUTS FIN
    //GESTTION DES TYPES DEBUT
        // ROUTES DEBUT
            Route::get('/Types','App\Http\Controllers\ParametreController@indexType')->name('Types');
            Route::get('TypeCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleType')->name('TypeCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreType','App\Http\Controllers\ParametreController@storeType')->name('ajouterParametreType');
            Route::post('modifierParametreType','App\Http\Controllers\ParametreController@updateType')->name('modifierParametreType');
            Route::post('supprimerParametreType','App\Http\Controllers\ParametreController@destroyType')->name('supprimerParametreType');
        // CREUD FIN
         // AUTRES DEBUT
            Route::post('corbeilleParametreType', 'App\Http\Controllers\ParametreController@corbeilleType')->name('corbeilleParametreType');
            Route::post('recupParametreType', 'App\Http\Controllers\ParametreController@recupUnCorbeilleType')->name('recupParametreType');
            Route::get('deleteAlltype', 'App\Http\Controllers\ParametreController@destroyTousType')->name('deleteAlltype');
            Route::get('corbeilleAlltype', 'App\Http\Controllers\ParametreController@corbeille_allType')->name('corbeilleAlltype');
            Route::get('recupAlltype', 'App\Http\Controllers\ParametreController@recupTousCorbeilleType')->name('recupAlltype');
     // AUTRES FIN
    //GESTTION DES TYPES FIN
    //GESTTION DES PAYS DEBUT
        // ROUTES DEBUT
            Route::get('/Payss','App\Http\Controllers\ParametreController@indexPays')->name('Payss');
            Route::get('PaysCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeillePays')->name('PaysCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametrePays','App\Http\Controllers\ParametreController@storePays')->name('ajouterParametrePays');
            Route::post('modifierParametrePays','App\Http\Controllers\ParametreController@updatePays')->name('modifierParametrePays');
            Route::post('supprimerParametrePays','App\Http\Controllers\ParametreController@destroyPays')->name('supprimerParametrePays');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametrePays', 'App\Http\Controllers\ParametreController@corbeillePays')->name('corbeilleParametrePays');
            Route::post('recupParametrePays', 'App\Http\Controllers\ParametreController@recupUnCorbeillePays')->name('recupParametrePays');
            Route::get('deleteAllpays', 'App\Http\Controllers\ParametreController@destroyTousPays')->name('deleteAllpays');
            Route::get('corbeilleAllpays', 'App\Http\Controllers\ParametreController@corbeille_allPays')->name('corbeilleAllpays');
            Route::get('recupAllpays', 'App\Http\Controllers\ParametreController@recupTousCorbeillePays')->name('recupAllpays');
     // AUTRES FIN
    //GESTTION DES PAYS FIN
    //GESTTION DES Profil DEBUT
        // ROUTES DEBUT
            Route::get('/Profils','App\Http\Controllers\ParametreController@indexProfil')->name('Profils');
            Route::get('ProfilCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleProfil')->name('ProfilCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreProfil','App\Http\Controllers\ParametreController@storeProfil')->name('ajouterParametreProfil');
            Route::post('modifierParametreProfil','App\Http\Controllers\ParametreController@updateProfil')->name('modifierParametreProfil');
            Route::post('supprimerParametreProfil','App\Http\Controllers\ParametreController@destroyProfil')->name('supprimerParametreProfil');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreProfil', 'App\Http\Controllers\ParametreController@corbeilleProfil')->name('corbeilleParametreProfil');
            Route::post('recupParametreProfil', 'App\Http\Controllers\ParametreController@recupUnCorbeilleProfil')->name('recupParametreProfil');
            Route::get('deleteAllprofil', 'App\Http\Controllers\ParametreController@destroyTousProfil')->name('deleteAllprofil');
            Route::get('corbeilleAllprofil', 'App\Http\Controllers\ParametreController@corbeille_allProfil')->name('corbeilleAllprofil');
            Route::get('recupAllprofil', 'App\Http\Controllers\ParametreController@recupTousCorbeilleProfil')->name('recupAllprofil');
        // AUTRES FIN
    //GESTTION DES Profil FIN
    //GESTTION DES HABILITATIONS DEBUT
        // ROUTES DEBUT
            Route::get('/Habilitations','App\Http\Controllers\ParametreController@indexHabilitation')->name('Habilitations');
            Route::get('HabilitationCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleHabilitation')->name('HabilitationCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreHabilitation','App\Http\Controllers\ParametreController@storeHabilitation')->name('ajouterParametreHabilitation');
            Route::post('modifierParametreHabilitation','App\Http\Controllers\ParametreController@updateHabilitation')->name('modifierParametreHabilitation');
            Route::post('supprimerParametreHabilitation','App\Http\Controllers\ParametreController@destroyHabilitation')->name('supprimerParametreHabilitation');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreHabilitation', 'App\Http\Controllers\ParametreController@corbeilleHabilitation')->name('corbeilleParametreHabilitation');
            Route::post('recupParametreHabilitation', 'App\Http\Controllers\ParametreController@recupUnCorbeilleHabilitation')->name('recupParametreHabilitation');
            Route::get('deleteAllhabilitation', 'App\Http\Controllers\ParametreController@destroyTousHabilitation')->name('deleteAllhabilitation');
            Route::get('corbeilleAllhabilitation', 'App\Http\Controllers\ParametreController@corbeille_allHabilitation')->name('corbeilleAllhabilitation');
            Route::get('recupAllhabilitation', 'App\Http\Controllers\ParametreController@recupTousCorbeilleHabilitation')->name('recupAllhabilitation');
        // AUTRES FIN
    //GESTTION DES HABILITATIONS FIN
    //GESTTION DES CATEGORIES DEBUT
        // ROUTES DEBUT
            Route::get('/Categories','App\Http\Controllers\ParametreController@indexCategorie')->name('Categories');
            Route::get('CategorieCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleCategorie')->name('CategorieCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreCategorie','App\Http\Controllers\ParametreController@storeCategorie')->name('ajouterParametreCategorie');
            Route::post('modifierParametreCategorie','App\Http\Controllers\ParametreController@updateCategorie')->name('modifierParametreCategorie');
            Route::post('supprimerParametreCategorie','App\Http\Controllers\ParametreController@destroyCategorie')->name('supprimerParametreCategorie');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreCategorie', 'App\Http\Controllers\ParametreController@corbeilleCategorie')->name('corbeilleParametreCategorie');
            Route::post('recupParametreCategorie', 'App\Http\Controllers\ParametreController@recupUnCorbeilleCategorie')->name('recupParametreCategorie');
            Route::get('deleteAllcategorie', 'App\Http\Controllers\ParametreController@destroyTousCategorie')->name('deleteAllcategorie');
            Route::get('corbeilleAllcategorie', 'App\Http\Controllers\ParametreController@corbeille_allCategorie')->name('corbeilleAllcategorie');
            Route::get('recupAllcategorie', 'App\Http\Controllers\ParametreController@recupTousCorbeilleCategorie')->name('recupAllcategorie');
        // AUTRES FIN
    //GESTTION DES CATEGORIES FIN
    //GESTTION DES GESTIONNAIREs DEBUT
        // ROUTES DEBUT
            Route::get('/Gestionnaires','App\Http\Controllers\ParametreController@indexGestionnaire')->name('Gestionnaires');
            Route::get('GestionnaireCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleGestionnaire')->name('GestionnaireCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreGestionnaire','App\Http\Controllers\ParametreController@storeGestionnaire')->name('ajouterParametreGestionnaire');
            Route::post('modifierParametreGestionnaire','App\Http\Controllers\ParametreController@updateGestionnaire')->name('modifierParametreGestionnaire');
            Route::post('supprimerParametreGestionnaire','App\Http\Controllers\ParametreController@destroyGestionnaire')->name('supprimerParametreGestionnaire');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreGestionnaire', 'App\Http\Controllers\ParametreController@corbeilleGestionnaire')->name('corbeilleParametreGestionnaire');
            Route::post('recupParametreGestionnaire', 'App\Http\Controllers\ParametreController@recupUnCorbeilleGestionnaire')->name('recupParametreGestionnaire');
            Route::get('deleteAllgestionnaire', 'App\Http\Controllers\ParametreController@destroyTousGestionnaire')->name('deleteAllgestionnaire');
            Route::get('corbeilleAllgestionnaire', 'App\Http\Controllers\ParametreController@corbeille_allGestionnaire')->name('corbeilleAllgestionnaire');
            Route::get('recupAllgestionnaire', 'App\Http\Controllers\ParametreController@recupTousCorbeilleGestionnaire')->name('recupAllgestionnaire');
        // AUTRES FIN
    //GESTTION DES GESTIONNAIREs FIN
    //GESTTION DES EMMETEURS DEBUT
        // ROUTES DEBUT
            Route::get('/Emmeteurs','App\Http\Controllers\ParametreController@indexEmmeteur')->name('Emmeteurs');
            Route::get('EmmeteurCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleEmmeteur')->name('EmmeteurCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreEmmeteur','App\Http\Controllers\ParametreController@storeEmmeteur')->name('ajouterParametreEmmeteur');
            Route::post('modifierParametreEmmeteur','App\Http\Controllers\ParametreController@updateEmmeteur')->name('modifierParametreEmmeteur');
            Route::post('supprimerParametreEmmeteur','App\Http\Controllers\ParametreController@destroyEmmeteur')->name('supprimerParametreEmmeteur');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreEmmeteur', 'App\Http\Controllers\ParametreController@corbeilleEmmeteur')->name('corbeilleParametreEmmeteur');
            Route::post('recupParametreEmmeteur', 'App\Http\Controllers\ParametreController@recupUnCorbeilleEmmeteur')->name('recupParametreEmmeteur');
            Route::get('deleteAllemmeteur', 'App\Http\Controllers\ParametreController@destroyTousEmmeteur')->name('deleteAllemmeteur');
            Route::get('corbeilleAllemmeteur', 'App\Http\Controllers\ParametreController@corbeille_allEmmeteur')->name('corbeilleAllemmeteur');
            Route::get('recupAllemmeteur', 'App\Http\Controllers\ParametreController@recupTousCorbeilleEmmeteur')->name('recupAllemmeteur');
        // AUTRES FIN
    //GESTTION DES EMMETEURS FIN
    //GESTTION DES DESTINATAIRES DEBUT
        // ROUTES DEBUT
            Route::get('/Destinataires','App\Http\Controllers\ParametreController@indexDestinataire')->name('Destinataires');
            Route::get('DestinataireCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleDestinataire')->name('DestinataireCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreDestinataire','App\Http\Controllers\ParametreController@storeDestinataire')->name('ajouterParametreDestinataire');
            Route::post('modifierParametreDestinataire','App\Http\Controllers\ParametreController@updateDestinataire')->name('modifierParametreDestinataire');
            Route::post('supprimerParametreDestinataire','App\Http\Controllers\ParametreController@destroyDestinataire')->name('supprimerParametreDestinataire');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreDestinataire', 'App\Http\Controllers\ParametreController@corbeilleDestinataire')->name('corbeilleParametreDestinataire');
            Route::post('recupParametreDestinataire', 'App\Http\Controllers\ParametreController@recupUnCorbeilleDestinataire')->name('recupParametreDestinataire');
            Route::get('deleteAlldestinataire', 'App\Http\Controllers\ParametreController@destroyTousDestinataire')->name('deleteAlldestinataire');
            Route::get('corbeilleAlldestinataire', 'App\Http\Controllers\ParametreController@corbeille_allDestinataire')->name('corbeilleAlldestinataire');
            Route::get('recupAlldestinataire', 'App\Http\Controllers\ParametreController@recupTousCorbeilleDestinataire')->name('recupAlldestinataire');
        // AUTRES FIN
    //GESTTION DES DESTINATAIRES FIN
    //GESTTION DES RECEVEURS DEBUT
        // ROUTES DEBUT
            Route::get('/Receveurs','App\Http\Controllers\ParametreController@indexReceveur')->name('Receveurs');
            Route::get('ReceveurCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleReceveur')->name('ReceveurCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreReceveur','App\Http\Controllers\ParametreController@storeReceveur')->name('ajouterParametreReceveur');
            Route::post('modifierParametreReceveur','App\Http\Controllers\ParametreController@updateReceveur')->name('modifierParametreReceveur');
            Route::post('supprimerParametreReceveur','App\Http\Controllers\ParametreController@destroyReceveur')->name('supprimerParametreReceveur');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreReceveur', 'App\Http\Controllers\ParametreController@corbeilleReceveur')->name('corbeilleParametreReceveur');
            Route::post('recupParametreReceveur', 'App\Http\Controllers\ParametreController@recupUnCorbeilleReceveur')->name('recupParametreReceveur');
            Route::get('deleteAllreceveur', 'App\Http\Controllers\ParametreController@destroyTousReceveur')->name('deleteAllreceveur');
            Route::get('corbeilleAllreceveur', 'App\Http\Controllers\ParametreController@corbeille_allReceveur')->name('corbeilleAllreceveur');
            Route::get('recupAllreceveur', 'App\Http\Controllers\ParametreController@recupTousCorbeilleReceveur')->name('recupAllreceveur');
        // AUTRES FIN
    //GESTTION DES RECEVEURS FIN
    //GESTTION DES ENTITES DEBUT
        // ROUTES DEBUT
            Route::get('/Entites','App\Http\Controllers\ParametreController@indexEntite')->name('Entites');
            Route::get('EntiteCorbeilles', 'App\Http\Controllers\ParametreController@indexCorbeilleEntite')->name('EntiteCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('ajouterParametreEntite','App\Http\Controllers\ParametreController@storeEntite')->name('ajouterParametreEntite');
            Route::post('modifierParametreEntite','App\Http\Controllers\ParametreController@updateEntite')->name('modifierParametreEntite');
            Route::post('supprimerParametreEntite','App\Http\Controllers\ParametreController@destroyEntite')->name('supprimerParametreEntite');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('corbeilleParametreEntite', 'App\Http\Controllers\ParametreController@corbeilleEntite')->name('corbeilleParametreEntite');
            Route::post('recupParametreEntite', 'App\Http\Controllers\ParametreController@recupUnCorbeilleEntite')->name('recupParametreEntite');
            Route::get('deleteAllentite', 'App\Http\Controllers\ParametreController@destroyTousEntite')->name('deleteAllentite');
            Route::get('corbeilleAllentite', 'App\Http\Controllers\ParametreController@corbeille_allEntite')->name('corbeilleAllentite');
            Route::get('recupAllentite', 'App\Http\Controllers\ParametreController@recupTousCorbeilleEntite')->name('recupAllentite');
        // AUTRES FIN
    //GESTTION DES ENTITES FIN
    // ARCHIVE DEBUT
        // ROUTES DEBUT
            Route::get('/Archives','App\Http\Controllers\ArchiveController@indexArchive')->name('Archives');
            Route::get('ArchiveCorbeilles', 'App\Http\Controllers\ArchiveController@indexCorbeilleArchive')->name('ArchiveCorbeilles');
        // ROUTES FIN
        // CREUD DEBUT
            Route::post('AjouterArchive','App\Http\Controllers\ArchiveController@storeArchive')->name('AjouterArchive');
            Route::post('ModifierArchive','App\Http\Controllers\ArchiveController@updateArchive')->name('ModifierArchive');
            Route::post('SupprimerArchive','App\Http\Controllers\ArchiveController@destroyArchive')->name('SupprimerArchive');
        // CREUD FIN
        // AUTRES DEBUT
            Route::post('CorbeilleArchive', 'App\Http\Controllers\ArchiveController@corbeilleArchive')->name('CorbeilleArchive');
            Route::post('recupArchive', 'App\Http\Controllers\ArchiveController@recupUnCorbeilleArchive')->name('recupArchive');
            Route::get('deleteAllarchive', 'App\Http\Controllers\ArchiveController@destroyTousArchive')->name('deleteAllarchive');
            Route::get('corbeilleAllarchive', 'App\Http\Controllers\ArchiveController@corbeille_allArchive')->name('corbeilleAllarchive');
            Route::get('recupAllarchive', 'App\Http\Controllers\ArchiveController@recupTousCorbeilleArchive')->name('recupAllarchive');
        // AUTRES FIN

    // ARCHIVE FIN
    Route::get('/stats', 'App\Http\Controllers\ArchiveController@stats')->name('stats');



});

Route::get('/terms', function () {
    return view('terms'); // Assurez-vous d'avoir une vue nommée 'terms.blade.php' pour les termes et conditions
})->name('terms.show');
Route::get('/policy', function () {
    return view('policy'); // Assurez-vous d'avoir une vue nommée 'policy.blade.php' pour la politique de confidentialité
})->name('policy.show');
