<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use Carbon\Carbon;
use App\Models\Archive;
use Carbon\CarbonPeriod;
use App\Models\Parametre;
use function Livewire\store;
use Illuminate\Http\Request;

use App\Models\TypeParametre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArchiveRequest;
use App\Http\Requests\UpdateArchiveRequest;
use App\Models\User;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['types'] = Parametre::where('type_parametre_id', 10)->orderBy('code')->get();
        $data['categories'] = Parametre::where('type_parametre_id', 15)->orderBy('code')->get();
        $data['postes'] = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();
        $data['archives'] = Archive::where('supprimer', 0)->orderBy('code')->get();
        return view("archives.liste")->with($data);
    }

    public function recherche($type_id,$categorie_id,$poste_id)
    {
        $data['types'] = Parametre::where('type_parametre_id', 10)->orderBy('code')->get();
        $data['categories'] = Parametre::where('type_parametre_id', 15)->orderBy('code')->get();
        $data['postes'] = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();

        if($type_id==0 && $categorie_id==0 && $poste_id==0){
            $data['archives'] = Archive::where('supprimer', 0)->orderBy('code')->get();
        }elseif($type_id!=0 && $categorie_id==0 && $poste_id==0){
            $data['archives'] = Archive::where('supprimer', 0)->where('type_id', $type_id)->orderBy('code')->get();
        }elseif($type_id!=1 && $categorie_id!=0 && $poste_id==0){
            $data['archives'] = Archive::where('supprimer', 0)->where('type_id', $type_id)->where('categorie_id', $categorie_id)->orderBy('code')->get();
        }elseif($type_id!=0 && $categorie_id!=0 && $poste_id!=0){
            $data['archives'] = Archive::where('supprimer', 0)->where('type_id', $type_id)->where('poste_id', $poste_id)->where('categorie_id', $categorie_id)->orderBy('code')->get();
        }elseif($type_id!=1 && $categorie_id!=1 && $poste_id==0){
            $data['archives'] = Archive::where('supprimer', 0)->where('categorie_id', $categorie_id)->orderBy('code')->get();
        }elseif($type_id!=0 && $categorie_id==1 && $poste_id==1){
            $data['archives'] = Archive::where('supprimer', 0)->where('poste_id', $poste_id)->where('categorie_id', $categorie_id)->orderBy('code')->get();
        }elseif($type_id!=0 && $categorie_id==0 && $poste_id==1){
            $data['archives'] = Archive::where('supprimer', 0)->where('poste_id', $poste_id)->orderBy('code')->get();
        }
        return view("archives.liste")->with($data);
    }

    public function recherche_archive(Request $request){
        redirect()->route('afficher_resultat_recherce',['type_id' =>$request->type_id,'categorie_id' =>$request->categorie_id,'poste_id' =>$request->poste_id,]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function ajouter()
    {
        $data['gestionaires'] = Parametre::where('type_parametre_id', 16)->orderBy('code')->get();
        $data['emeteurs'] = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();
        $data['destinataires'] = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();
        $data['receveurs'] = Parametre::where('type_parametre_id', 19)->orderBy('code')->get();
        $data['types'] = Parametre::where('type_parametre_id', 10)->orderBy('code')->get();
        $data['categories'] = Parametre::where('type_parametre_id', 15)->orderBy('code')->get();
        $data['postes'] = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();
        return view("archives.ajouter")->with($data);
    }


    // public function stats()
    // {
    //     $data['total'] = Archive::where('supprimer', 0)->count();
    //     $data['archives'] = Archive::where('supprimer', 0)->orderBy('id', 'desc')->limit(10)->get();
    //     $data['types'] = Parametre::where('type_parametre_id', 10)->orderBy('code')->get();
    //     $data['categories'] = Parametre::where('type_parametre_id', 15)->orderBy('code')->get();
    //     $data['postes'] = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();
    //     $data['gestionaires'] = Parametre::where('type_parametre_id', 16)->orderBy('id')->get();
    //     // return view("archives.stats")->with($data);








    //     // MON CODE DEBUT

    //     // Récupérer les catégories depuis la table "parametres"
    //     $categories = Parametre::where('type_parametre_id', 15)->orderBy('code')->get();

    //     // Récupérer le mois en cours
    //     $currentMonth = now()->format('m');

    //     // Effectuer une jointure avec la table "parametres" et filtrer par le mois en cours
    //     $archivesByCategory = Archive::join('parametres', 'archives.categorie_id', '=', 'parametres.id')
    //         ->where('parametres.code', 'categorie') // Filtre uniquement les catégories
    //         ->whereMonth('archives.created_at', $currentMonth)
    //         ->groupBy('parametres.libelle')
    //         ->select('parametres.libelle as category', DB::raw('count(*) as total'))
    //         ->get();
    //     // Préparer les données pour le graphique
    //     $data['categories'] = $categories;
    //     $data['archivesCount'] = $archivesByCategory->pluck('total');








    //         // dd($data ['archives']);

    //     // MON CODE FIN
    //     return view("admins.menus.home")->with($data);
    // }
    public function stats(Request $request){
        // CATEGORIE ARCHIVE DU MOIS EN COURS DEBUT
            $data['categories'] = Parametre::where('type_parametre_id', 15)->orderBy('code')->get();
            // Récupérer le mois en cours
                $currentMonth = now()->format('m');
            // Récupérer le nombre d'archives par catégorie pour le mois en cours debut
                $data['archivesByCategory'] = Parametre::where('type_parametre_id', 15)
                ->orderBy('code')
                ->select('libelle', DB::raw('CAST((SELECT COUNT(*) FROM archives WHERE categorie_id = parametres.id AND MONTH(created_at) = ' . $currentMonth . ') AS UNSIGNED) as total'))
                ->get();
        // CATEGORIE ARCHIVE DU MOIS EN COURS FIN
        // TYPE ARCHIVE (ENTRANT/SORTANT) PAR MOIS DEBUT
            // Récupérer les données pour chaque mois de l'année en cours
                $monthsData = [];
                for ($month = 1; $month <= 12; $month++) {
                    $monthName = DateTime::createFromFormat('!m', $month)->format('F'); // Obtient le nom complet du mois
                    $sensData = [];
                    // Récupérer les données pour chaque sens pour ce mois
                    $sens = Parametre::where('type_parametre_id', 10)->orderBy('code')->get();
                    foreach ($sens as $sens) {
                        // Récupérer les données pour ce sens pour ce mois
                        $entrantCount = Archive::where('type_id', $sens->id)
                            ->where('type_id', 116) // Parent_id pour les archives entrantes
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', now()->year)
                            ->count();

                        $sortantCount = Archive::where('type_id', $sens->id)
                            ->where('type_id', 117) // Parent_id pour les archives sortantes
                            ->whereMonth('created_at', $month)
                            ->whereYear('created_at', now()->year)
                            ->count();

                        $sensData[] = ['entrant' => $entrantCount, 'sortant' => $sortantCount];
                    }
                    $monthsData[$monthName] = $sensData;
                }
                // Ajouter les données au tableau $data
                $data['monthsData'] = $monthsData;
        // TYPE ARCHIVE (ENTRANT/SORTANT) PAR MOIS FIN
        // TENDANCE ARCHIVE PIE CHART DEBUT
            // Récupérer tous les paramètres
            $parametres = Parametre::where('type_parametre_id', 15)->where('supprimer','=',0)->get();
            // Initialiser un tableau pour stocker les données du pie chart par catégorie
            $pieCategorie = [];
            // Parcourir chaque paramètre
            foreach ($parametres as $parametre) {
                // Compter le nombre d'archives pour ce paramètre
                $count = Archive::where('categorie_id', $parametre->id)->count();
                // Stocker le nombre d'archives dans le tableau avec la clé du paramètre
                $pieCategorie[$parametre->libelle] = $count;
            }
            // Ajouter le tableau des données du pie chart au tableau de données principal
            $data['pieCategorie'] = $pieCategorie;
        // TENDANCE ARCHIVE PIE CHART DEBUT
        // TOTEAUX DEBUT
            $data['gestionnairett'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',16)->orderBy('libelle')->count();
            $data['emmeteurtt'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',17)->orderBy('libelle')->count();
            $data['destinatairett'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',18)->orderBy('libelle')->count();
            $data['recepteurtt'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',19)->orderBy('libelle')->count();
            $data['administrationtt']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',9)->orderBy('libelle')->count();
            $data['categoriett'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',15)->orderBy('libelle')->count();
            $data['archivett']= Archive::where('supprimer','=',0)->count();
            $data['usertt']= User::where('supprimer','=',0)->count();
            $data['quartiertt'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',5)->orderBy('libelle')->count();
            $data['parametrett'] = Parametre::where('supprimer','=',0)->orderBy('libelle')->count();
        // TOTEAUX FIN












    // Récupérer la liste des postes
    // 1. Récupération de toutes les archives
        // Initialisation de la requête pour les archives
        $archives = Archive::query();

        // 2. Filtrage des archives par période
        $interval = $request->interval;
        if ($interval === 'jour') {
            $archives->whereDate('created_at', now()->toDateString());
        } elseif ($interval === 'semaine') {
            $archives->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($interval === 'mois') {
            $archives->whereMonth('created_at', now()->month);
        } elseif ($interval === 'trimestre') {
            $quarter = ceil(now()->month / 3);
            $archives->whereRaw('QUARTER(created_at) = ?', [$quarter]);
        } elseif ($interval === 'annee') {
            $archives->whereYear('created_at', now()->year);
        }

        // 3. Filtrage des archives par type de poste
        $type = $request->type;
        if ($type === 'prive') {
            $archives->where('type_fichier', 1); // Fichiers privés
        } elseif ($type === 'public') {
            $archives->where('type_fichier', '!=', 1); // Fichiers non privés
        }

        // 4. Comptage des archives par poste
        $postes = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();
        $totaux = [];
        foreach ($postes as $poste) {
            $total = $archives->where('poste_id', $poste->id)->count();
            $totaux[] = $total;
        }

        // Préparer les données pour la vue
        $data['postes'] = $postes->pluck('libelle')->toArray();
        $data['totaux'] = $totaux;
       




        return view('admins.menus.home')->with('data', $data);

// return view('admins.menus.home')->with('data', $data);

    }







    public function supprimer($id){
        $data['gestionaires'] = Parametre::where('type_parametre_id', 16)->orderBy('code')->get();
        $data['emeteurs'] = Parametre::where('type_parametre_id', 17)->orderBy('code')->get();
        $data['destinataires'] = Parametre::where('type_parametre_id', 18)->orderBy('code')->get();
        $data['receveurs'] = Parametre::where('type_parametre_id', 19)->orderBy('code')->get();
        $data['types'] = Parametre::where('type_parametre_id', 10)->orderBy('code')->get();
        $data['categories'] = Parametre::where('type_parametre_id', 15)->orderBy('code')->get();
        $data['postes'] = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();

        $data['archive'] = Archive::findOrFail($id);
        return view("archives.supprimer")->with($data);
    }
    public function softdelete(Request $request){

        $archive = Archive::findOrfail($request->id);
        try{
            $archive->update(['supprimer' => 1, 'user_id' => Auth::user()->id]);

            toast("Archive mis en corbeille avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return redirect()->route('Liste des Archive');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArchiveRequest $request)
    {
        $type = isset($request->type_fichier)?$request->type_fichier:0;
        if($type==1){
            if ($request->hasFile('fichier') && $request->file('fichier')->isValid()) {
                // Utilisez le disque local pour enregistrer le fichier
                $fichier = Storage::disk('local')->put('prives', $request->file('fichier'));
                $fichier = "C:\Users\CNPE\Documents\Archives\\".$fichier;
            }
        }else{
            if(isset($request->fichier) and !empty($request->fichier)){
                $fichier = Storage::disk('public')->put('Archives', $request->file('fichier'));
                $fichier = $request->fichier->store("public/archives");
            }else{
                $fichier = "";
            }
        }


        try{
            Archive::create(['code' => $request->code,
                'libelle' => $request->libelle,
                'objet' => $request->objet,
                'desc' => $request->desc,
                'desc2' => $request->desc2,
                'emetteur' => $request->emetteur,
                'date_emission' => $request->date_emission,
                'destinataire' => $request->destinataire,
                'date_reception' => $request->date_reception,
                'receveur' => $request->receveur,
                'date' => date('d/m/Y'),
                'ampillation' => $request->ampillation,
                'type_fichier' => $type,
                'fichier' => $fichier,
                'gestionaire_id' => $request->gestionaire_id,
                'emeteur_id' => $request->emeteur_id,
                'destinataire_id' => $request->destinataire_id,
                'receveur_id' => $request->receveur_id,
                'type_id' => $request->type_id,
                'categorie_id' => $request->categorie_id,
                'poste_id' => $request->poste_id,
                'user_id' => Auth::user()->id,
            ]);
            toast("Document archivé avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function details($id)
    {
        $data['archive'] = Archive::findOrFail($id);
        return view("archives.details")->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['gestionaires'] = Parametre::where('type_parametre_id', 16)->orderBy('code')->get();
        $data['emeteurs'] = Parametre::where('type_parametre_id', 17)->orderBy('code')->get();
        $data['destinataires'] = Parametre::where('type_parametre_id', 18)->orderBy('code')->get();
        $data['receveurs'] = Parametre::where('type_parametre_id', 19)->orderBy('code')->get();
        $data['types'] = Parametre::where('type_parametre_id', 10)->orderBy('code')->get();
        $data['categories'] = Parametre::where('type_parametre_id', 15)->orderBy('code')->get();
        $data['postes'] = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();
        $data['archive'] = Archive::findOrFail($id);
        return view("archives.modifier")->with($data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArchiveRequest $request, Archive $archive)
    {
        $archive = Archive::findOrfail($request->id);
        $type = "";
        if(isset($request->fichier) and !empty($request->fichier)){
            $fichier = $request->fichier->store("public/archives");
        }else{
            $fichier = $archive->fichier;
        }
        try{
            $archive->update(['code' => $request->code,
                            'libelle' => $request->libelle,
                            'objet' => $request->objet,
                            'desc' => $request->desc,
                            'desc2' => $request->desc2,
                            'emetteur' => $request->emetteur,
                            'date_emission' => $request->date_emission,
                            'destinataire' => $request->destinataire,
                            'date_reception' => $request->date_reception,
                            'receveur' => $request->receveur,
                            'ampillation' => $request->ampillation,
                            'type_fichier' => $type,
                            'fichier' => $fichier,
                            'gestionaire_id' => $request->gestionaire_id,
                            'emeteur_id' => $request->emeteur_id,
                            'destinataire_id' => $request->destinataire_id,
                            'receveur_id' => $request->receveur_id,
                            'type_id' => $request->type_id,
                            'categorie_id' => $request->categorie_id,
                            'poste_id' => $request->poste_id,
                            'user_id' => Auth::user()->id,
            ]);

            toast("Archive modifiée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        //
    }
    // ARCHIVE DEBUT
        public function indexArchive(){
            $data['ArchiveTotal']= Archive::where('supprimer','=',0)->count();
            $data['ArchiveTotalC']= Archive::where('supprimer','=',1)->count();
            // $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            // $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',8)->orderBy('libelle')->get();

            // Debut
                $data['sens'] = Parametre::where('type_parametre_id','=', 10)->orderBy('code')->get();
                $data['categories'] = Parametre::where('type_parametre_id','=', 15)->orderBy('code')->get();
                $data['gestionaires'] = Parametre::where('type_parametre_id','=', 16)->orderBy('code')->get();
                $data['postes'] = Parametre::where('type_parametre_id','=', 9)->orderBy('code')->get();
                $data['emeteurs'] = Parametre::where('type_parametre_id','=', 17)->orderBy('code')->get();
                $data['destinataires'] = Parametre::where('type_parametre_id', 18)->orderBy('code')->get();
                $data['receveurs'] = Parametre::where('type_parametre_id', 19)->orderBy('code')->get();

                $data['archives'] = Archive::where('supprimer', 0)->orderBy('code')->get();
            return view("admins.gestions.archives.archive")->with($data);
        }
        public function indexCorbeilleArchive(){
            $data['ArchiveTotal']= Archive::where('supprimer','=',0)->count();
            $data['ArchiveTotalC']= Archive::where('supprimer','=',1)->count();

            // Debut
                $data['sens'] = Parametre::where('type_parametre_id','=', 10)->orderBy('code')->get();
                $data['categories'] = Parametre::where('type_parametre_id','=', 15)->orderBy('code')->get();
                $data['gestionaires'] = Parametre::where('type_parametre_id','=', 16)->orderBy('code')->get();
                $data['postes'] = Parametre::where('type_parametre_id','=', 9)->orderBy('code')->get();
                $data['emeteurs'] = Parametre::where('type_parametre_id','=', 17)->orderBy('code')->get();
                $data['destinataires'] = Parametre::where('type_parametre_id', 18)->orderBy('code')->get();
                $data['receveurs'] = Parametre::where('type_parametre_id', 19)->orderBy('code')->get();

                $data['archives'] = Archive::where('supprimer', 1)->orderBy('code')->get();
            return view("admins.gestions.archives.corbeillearchive")->with( $data);
        }
        public function  storeArchive(Request $request){
            $type = isset($request->type_fichier)?$request->type_fichier:0;
            if($type==1){
                if ($request->hasFile('fichier') && $request->file('fichier')->isValid()) {
                    // Utilisez le disque local pour enregistrer le fichier
                    $fichier = Storage::disk('local')->put('prives', $request->file('fichier'));
                    $fichier = "C:\Users\CNPE\Documents\Archives\\".$fichier;
                }
            }else{
                if(isset($request->fichier) and !empty($request->fichier)){
                    $fichier = Storage::disk('public')->put('Archives', $request->file('fichier'));
                    $fichier = $request->fichier->store("public/archives");
                }else{
                    $fichier = "";
                }
            }
            $code = $request->code;
            $libelle = $request->libelle;
            $objet = $request->objet;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $emetteur = $request->emetteur;
            $date_emission = $request->date_emission;
            $destinataire = $request->destinataire;
            $date_reception = $request->date_reception;
            $receveur = $request->receveur;
            $ampillation = $request->ampillation;
            $gestionaire_id = $request->gestionaire_id;
            $emeteur_id = $request->emeteur_id;
            $destinataire_id = $request->destinataire_id;
            $receveur_id = $request->receveur_id;
            $type_id = $request->type_id;
            $categorie_id = $request->categorie_id;
            $poste_id = $request->poste_id;
            try{
                Archive::create([
                    'code' => $code,
                    'libelle' => $libelle,
                    'objet' => $objet,
                    'desc' => $desc,
                    'desc2' => $desc2,
                    'emetteur' => $emetteur,
                    'date_emission' => $date_emission,
                    'destinataire' => $destinataire,
                    'date_reception' => $date_reception,
                    'receveur' => $receveur,
                    'date' => date('d/m/Y'),
                    'ampillation' => $ampillation,
                    'type_fichier' => $type,
                    'fichier' => $fichier,
                    'gestionaire_id' => $gestionaire_id,
                    'emeteur_id' => $emeteur_id,
                    'destinataire_id' => $destinataire_id,
                    'receveur_id' => $receveur_id,
                    'type_id' => $type_id,
                    'categorie_id' => $categorie_id,
                    'poste_id' => $poste_id,
                    'user_id' => Auth::user()->id,
                ]);
                toast("Document archivé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function updateArchive(Request $request){
            $archive = Archive::findOrfail($request->id);

            $type_fichier = $request->has('type_fichier') ? 1 : 0;
            if($type_fichier=="1"){
                if (isset($request->fichier) and !empty($request->fichier)) {
                    // Utilisez le disque local pour enregistrer le fichier
                    $fichier = Storage::disk('local')->put('prives', $request->file('fichier'));
                    $fichier = "C:\Users\CNPE\Documents\Archives\\".$fichier;

                }else{
                    $fichier = $archive->fichier;
                }
            }else{
                if(isset($request->fichier) and !empty($request->fichier)){
                    $fichier = Storage::disk('public')->put('Archives', $request->file('fichier'));
                    $fichier = $request->fichier->store("public/archives");
                }else{
                    $fichier = $archive->fichier;
                }

            }

            $code= isset($request->code)?$request->code:$archive->code;
            $libelle= isset($request->libelle)?$request->libelle:$archive->libelle;
            $objet= isset($request->objet)?$request->objet:$archive->objet;
            $desc= isset($request->desc)?$request->desc:$archive->desc;
            $desc2= isset($request->desc2)?$request->desc2:$archive->desc2;
            $emetteur= isset($request->emetteur)?$request->emetteur:$archive->emetteur;
            $date_emission= isset($request->date_emission)?$request->date_emission:$archive->date_emission;
            $destinataire= isset($request->destinataire)?$request->destinataire:$archive->destinataire;
            $date_reception= isset($request->date_reception)?$request->date_reception:$archive->date_reception;
            $receveur= isset($request->receveur)?$request->receveur:$archive->receveur;
            $date= isset($request->date)?$request->date:$archive->date;
            $ampillation= isset($request->ampillation)?$request->ampillation:$archive->ampillation;
            $gestionaire_id= isset($request->gestionaire_id)?$request->gestionaire_id:$archive->gestionaire_id;
            $emeteur_id= isset($request->emeteur_id)?$request->emeteur_id:$archive->emeteur_id;
            $destinataire_id= isset($request->destinataire_id)?$request->destinataire_id:$archive->destinataire_id;
            $receveur_id= isset($request->receveur_id)?$request->receveur_id:$archive->receveur_id;
            $type_id= isset($request->type_id)?$request->type_id:$archive->type_id;
            $categorie_id= isset($request->categorie_id)?$request->categorie_id:$archive->categorie_id;
            $poste_id= isset($request->poste_id)?$request->poste_id:$archive->poste_id;

            try{
                $archive->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'objet' => $objet,
                    'desc' => $desc,
                    'desc2' => $desc2,
                    'emetteur' => $emetteur,
                    'date_emission' => $date_emission,
                    'destinataire' => $destinataire,
                    'date_reception' => $date_reception,
                    'receveur' => $receveur,
                    'date' => date('d/m/Y'),
                    'ampillation' => $ampillation,
                    'type_fichier' => $type_fichier,
                    'fichier' => $fichier,
                    'gestionaire_id' => $gestionaire_id,
                    'emeteur_id' => $emeteur_id,
                    'destinataire_id' => $destinataire_id,
                    'receveur_id' => $receveur_id,
                    'type_id' => $type_id,
                    'categorie_id' => $categorie_id,
                    'poste_id' => $poste_id,
                    'user_id' => Auth::user()->id,

                ]);
                toast("Archive modifiée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
                // die($e->getMessage());
            }
            return back();


        }
        public function corbeilleArchive(Request $request){
            $archive = Archive::findOrFail($request->id);
            try{
                $archive->update([
                    'supprimer' =>1,
                    'user_id' => Auth::user()->id
                ]);
                toast('Archive supprimée avec success','success');

            }
            catch(Exception $e){
                toast("Supression de l'archive impossible",'danger');
            }
            return back();
        }
        public function destroyArchive(Request $request){
            $archive = Archive::findOrFail($request->id);
            try{
                $archive->delete();
                toast("Archive supprimée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allArchive(Request $request){
            $archives = Archive::where('supprimer', 0)->get();
            try{
                foreach($archives as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Archives supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des archives impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleArchive(Request $request){
            $archive = Archive::findOrFail($request->id);
            try{
                $archive->update([
                    'supprimer' =>0
                ]);
                toast('Archive restaurée avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration de l'archive impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleArchive(Request $request){
            $archives = Archive::where('supprimer', 1)->get();
            try{
                foreach($archives as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Archives restorées avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des archives impossible','danger');
            }
            return back();
        }
        public function destroyTousArchive(Request $request){
            $archives = Archive::where('supprimer', 1)->get();
            try{
                foreach($archives as $value){
                    $value->delete();
                }
                toast('Supression des archives éffectuées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des archives impossible','danger');
            }
            return back();
        }
    //ARCHIVE FIN
}


