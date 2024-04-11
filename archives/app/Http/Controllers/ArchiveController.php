<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Http\Requests\StoreArchiveRequest;
use App\Http\Requests\UpdateArchiveRequest;
use App\Models\Parametre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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


    public function stats()
    {
        $data['total'] = Archive::where('supprimer', 0)->count();
        $data['archives'] = Archive::where('supprimer', 0)->orderBy('id', 'desc')->limit(10)->get();
        $data['types'] = Parametre::where('type_parametre_id', 10)->orderBy('code')->get();
        $data['categories'] = Parametre::where('type_parametre_id', 15)->orderBy('code')->get();
        $data['postes'] = Parametre::where('type_parametre_id', 9)->orderBy('code')->get();
        $data['gestionaires'] = Parametre::where('type_parametre_id', 16)->orderBy('id')->get();
        // return view("archives.stats")->with($data);
        return view("admins.menus.home")->with($data);
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
}
