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
            Route::post('recupParametreArrondissement', 'App\Http\Controllers\ParametreController@recupTousCorbeilleArrondissement')->name('recupParametreArrondissement');
            Route::get('deleteAllarrondissement', 'App\Http\Controllers\ParametreController@destroyTousArrondissement')->name('deleteAllarrondissement');
            Route::get('corbeilleAllarrondissement', 'App\Http\Controllers\ParametreController@corbeille_allArrondissement')->name('corbeilleAllarrondissement');
            Route::get('recupAllarrondissement', 'App\Http\Controllers\ParametreController@recupTousCorbeilleArrondissements')->name('recupAlarrondissement');
        // AUTRES FIN
    // GESTION DES ARRONDISSEMENTS FIN
});

Route::get('/terms', function () {
    return view('terms'); // Assurez-vous d'avoir une vue nommée 'terms.blade.php' pour les termes et conditions
})->name('terms.show');
Route::get('/policy', function () {
    return view('policy'); // Assurez-vous d'avoir une vue nommée 'policy.blade.php' pour la politique de confidentialité
})->name('policy.show');
