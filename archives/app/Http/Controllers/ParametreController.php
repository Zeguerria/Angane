<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use App\Http\Requests\StoreParametreRequest;
use App\Http\Requests\UpdateParametreRequest;
use App\Models\TypeParametre;
use Exception;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function ajouter()
    {
        $data['types'] = TypeParametre::orderBy('code')->get();
        return view("parametres.ajouter")->with($data);
    }
    public function details($id)
    {
        $data['parametre'] = Parametre::findOrFail($id);
        $data['types'] = TypeParametre::orderBy('code')->get();
        return view("parametres.details")->with($data);
    }
    public function modifier($id)
    {
        $data['parametre'] = Parametre::findOrFail($id);
        $data['types'] = TypeParametre::orderBy('code')->get();
        return view("parametres.modifier")->with($data);
    }
    public function supprimer($id)
    {
        $data['parametre'] = Parametre::findOrFail($id);
        $data['types'] = TypeParametre::orderBy('code')->get();
        return view("parametres.supprimer")->with($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $parametre = Parametre::findOrFail($request->id);
        try{
            $parametre->delete();
            toast("Parametre supprimé avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return back();
    }
    public function corbeille_all(Request $request){
        $parametre = Parametre::where('supprimer', 0)->orderBy('code')->get();
        try{
            foreach($parametre as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Parametres supprimé avec success','success');

        }
        catch(Exception $e){
            toast('Supression des parametres impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $parametre = Parametre::findOrFail($request->id);
        try{
            $parametre->update([
                'supprimer' =>0
            ]);
            toast('Parametre restauré avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration du Parametre impossible','danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $parametre = Parametre::where('supprimer', 1)->orderBy('code')->get();
        try{
            foreach($parametre as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Parametre restoré avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration du Parametre impossible','danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $parametre = Parametre::where('supprimer', 1)->orderBy('code')->get();
        try{
            foreach($parametre as $value){
                $value->delete();
            }
            toast('Supression des Parametres éffectué avec success','success');

        }
        catch(Exception $e){
            toast('Supression des Parametres impossible','danger');
        }
        return back();
    }
    // LES PARAMETRES EN GENERAL DEBUT
        public function index()
        {
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->orderBy('code')->get();
            return view("admins.gestions.parametrages.parametres.parametre")->with($data);
        }
        public function indexCorbeille()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->orderBy('code')->get();
            return view('admins.gestions.parametrages.parametres.corbeilleparametre')->with($data);


        }
        public function store(Request $request)
        {
            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $type_parametre_id=$request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'type_parametre_id'=>$type_parametre_id
                ]);
                toast("Parametre Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast('Ajout  du Parametre impossible','danger');

            }
            return back();
        }

        public function update(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => $type_parametre_id,
                    'desc2' => $desc2,
                    'desc3' => $desc3
                ]);
                toast("Parametre modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Parametre supprimé avec success','success');

            }
            catch(Exception $e){
                toast('Supression du Parametre impossible','danger');
            }
            return back();
        }
    // LES PARAMETRES EN GENERAL FIN
    // LES PROVINCES DEBUT
        public function indexProvince(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',2)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',2)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',2)->orderBy('code')->get();
            return view("admins.gestions.parametrages.provinces.province")->with($data);
        }
        public function indexCorbeilleProvince()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',2)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',2)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',2)->orderBy('code')->get();
            return view('admins.gestions.parametrages.provinces.corbeilleprovince')->with($data);
        }
        public function storeProvince(Request $request)
        {
            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $type_parametre_id=$request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'type_parametre_id'=>2
                ]);
                toast("Provice Ajoutée avec succès",'success');

            }
            catch(Exception $e){
                toast('Ajout  de la province impossible','danger');

            }
            return back();
        }

        public function updateProvince(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 2,
                    'desc2' => $desc2,
                    'desc3' => $desc3
                ]);
                toast("Province modifiée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleProvince(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Province supprimée avec success','success');

            }
            catch(Exception $e){
                toast('Supression de la province impossible','danger');
            }
            return back();
        }
        public function destroyProvince(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Province supprimée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allProvince(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',2)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Provinces supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des provinces impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleProvince(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Province restaurée avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration de la province impossible','danger');
            }
            return back();
        }
        public function recupTousCorbeilleProvince(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',2)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Provinces restorées avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des provinces impossible','danger');
            }
            return back();
        }
        public function destroyTousProvince(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',2)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des provinces éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des provinces impossible','danger');
            }
            return back();
        }
    // LES PROVINCES FIN
    //
    // LES ARRONDISSEMENT DEBUT
        public function indexArrondissement(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',4)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',4)->orderBy('code')->count();
            $data['communes']= Parametre::where('type_parametre_id','=',3)->orderBy('libelle')->get();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();

            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',4)->orderBy('parent_id')->get();
            return view("admins.gestions.parametrages.arrondissements.arrondissement")->with($data);
        }
        public function indexCorbeilleArrondissement()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',4)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',4)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            $data['communes']= Parametre::where('type_parametre_id','=',3)->orderBy('libelle')->get();

            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',4)->orderBy('code')->get();
            return view('admins.gestions.parametrages.arrondissements.corbeillearrondissement')->with($data);
        }
        public function storeArrondissement(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>$parent_id,
                    'type_parametre_id'=>4
                ]);
                toast("Arrondissement Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  de l'arrondissement impossible",'danger');

            }
            return back();
        }

        public function updateArrondissement(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 4,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => $parent_id
                ]);
                toast("Arrondissement modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleArrondissement(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Arrondissement supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression de l'arrondissement impossible",'danger');
            }
            return back();
        }
        public function destroyArrondissement(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Arrondissement supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allArrondissement(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',4)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Arrondissement supprimés avec success','success');

            }
            catch(Exception $e){
                toast('Supression des arrondissements impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleArrondissement(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Arrondissement restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration de l'arrondissement impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleArrondissements(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',4)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Arrondissements restorées avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des arrondissements impossible','danger');
            }
            return back();
        }
        public function destroyTousArrondissement(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',4)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des arrondissements éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des arrondissements impossible','danger');
            }
            return back();
        }
    // LES ARRONDISSEMENT FIN

    // CMMNE DEBT
        public function indexCommune(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',3)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',3)->orderBy('code')->count();
            $data['provinces']= Parametre::where('parent_id','=',1)->orderBy('libelle')->get();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();

            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',3)->orderBy('code')->get();
            return view("admins.gestions.parametrages.communes.commune")->with($data);
        }
        public function indexCorbeilleCommune()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',3)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',3)->orderBy('code')->count();
            $data['provinces']= Parametre::where('parent_id','=',1)->orderBy('libelle')->get();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();

            $data['parametres'] = Parametre::where('supprimer','=',1)->where('type_parametre_id','=',3)->orderBy('code')->get();
            return view('admins.gestions.parametrages.communes.corbeillecommune')->with($data);
        }
        public function storeCommune(Request $request)
        {
            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id=$request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>$parent_id,
                    'type_parametre_id'=>3
                ]);
                toast("Commune Ajoutée avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  de la commune impossible",'danger');

            }
            return back();
        }
        public function updateCommune(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 3,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => $parent_id
                ]);
                toast("Commune modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleCommune(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Commune supprimée avec success','success');

            }
            catch(Exception $e){
                toast("Supression de la commune impossible",'danger');
            }
            return back();
        }
        public function destroyCommune(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Commune supprimée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allCommune(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',3)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Communes supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des communes impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleCommune(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Commune restaurée avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration de la commune impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleCommunes(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',3)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Communes restorées avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des communes impossible','danger');
            }
            return back();
        }
        public function destroyTousCommune(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',3)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des communes éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des communes impossible','danger');
            }
            return back();
        }
    // CMMNE FN

    // QUARTIER DEBUT
        public function indexQuartier(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',5)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',5)->orderBy('code')->count();
            $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',5)->orderBy('parent_id')->get();
            return view("admins.gestions.parametrages.quartiers.quartier")->with($data);
        }
        public function indexCorbeilleQuartier()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',5)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',5)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',5)->orderBy('code')->get();
            return view('admins.gestions.parametrages.quartiers.corbeillequartier')->with($data);
        }
        public function storeQuartier(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>$parent_id,
                    'type_parametre_id'=>5
                ]);
                toast("Quartier Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  du quartier impossible",'danger');

            }
            return back();
        }
        public function updateQuartier(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 5,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => $parent_id
                ]);
                toast("Quartier modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleQuartier(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Quartier supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression du quartier impossible",'danger');
            }
            return back();
        }
        public function destroyQuartier(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Quartier supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allQuartier(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',5)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Quartiers supprimés avec success','success');

            }
            catch(Exception $e){
                toast('Supression des quartiers impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleQuartier(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Quartier restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration du quartier impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleQuartier(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',5)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Quartiers restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des quartiers impossible','danger');
            }
            return back();
        }
        public function destroyTousQuartier(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',5)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des quartiers éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des quartiers impossible','danger');
            }
            return back();
        }
    // QUARTIER FIN
    // POSTES DEBUT
        public function indexPoste(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',9)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',9)->orderBy('code')->count();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',9)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.postes.poste")->with($data);
        }
        public function indexCorbeillePoste()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',9)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',9)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',9)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.postes.corbeilleposte')->with($data);
        }
        public function storePoste(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>9
                ]);
                toast("Poste Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  du poste impossible",'danger');

            }
            return back();
        }
        public function updatePoste(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 9,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Poste modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeillePoste(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Poste supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression du poste impossible",'danger');
            }
            return back();
        }
        public function destroyPoste(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Poste supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allPoste(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',9)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Postes supprimés avec success','success');

            }
            catch(Exception $e){
                toast('Supression des postes impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeillePoste(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Poste restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration du poste impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeillePoste(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',9)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Postes restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des postes impossible','danger');
            }
            return back();
        }
        public function destroyTousPoste(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',9)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des postes éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des postes impossible','danger');
            }
            return back();
        }
    // POSTES FIN
    // STATUTS DEBUT
        public function indexStatut(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',8)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',8)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',8)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.statuts.statut")->with($data);
        }
        public function indexCorbeilleStatut()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',8)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',8)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',8)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.statuts.corbeillestatut')->with($data);
        }
        public function storeStatut(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>8
                ]);
                toast("Statut Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  du statut impossible",'danger');

            }
            return back();
        }
        public function updateStatut(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 8,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Statuts modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleStatut(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Statut supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression du statut impossible",'danger');
            }
            return back();
        }
        public function destroyStatut(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Statut supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allStatut(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',8)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Statuts supprimés avec success','success');

            }
            catch(Exception $e){
                toast('Supression des statuts impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleStatut(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Statut restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration du statut impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleStatut(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',8)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Statuts restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des statuts impossible','danger');
            }
            return back();
        }
        public function destroyTousStatut(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',8)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des statuts éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des statuts impossible','danger');
            }
            return back();
        }
    // STATUTS FIN
    // LES TYPE(ENTRANT:SORTANTIAL) DEBUT
        public function indexType(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',10)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',10)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',10)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.types.type")->with($data);
        }
        public function indexCorbeilleType()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',10)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',10)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',10)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.types.corbeilletype')->with($data);
        }
        public function storeType(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>10
                ]);
                toast("Type Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  du type impossible",'danger');

            }
            return back();
        }
        public function updateType(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 10,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Type modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleType(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Type supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression du type impossible",'danger');
            }
            return back();
        }
        public function destroyType(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Type supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allType(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',10)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Types supprimés avec success','success');

            }
            catch(Exception $e){
                toast('Supression des types impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleType(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Type restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration du type impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleType(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',10)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Types restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des types impossible','danger');
            }
            return back();
        }
        public function destroyTousType(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',10)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des types éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des types impossible','danger');
            }
            return back();
        }
    // LES TYPE(ENTRANT:SORTANTIAL) FIN
    // LES PAYS DEBUT
        public function indexPays(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',11)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',11)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',11)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.pays.pays")->with($data);
        }
        public function indexCorbeillePays()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',11)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',11)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',11)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.pays.corbeillepays')->with($data);
        }
        public function storePays(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>11
                ]);
                toast("Pays Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  du pays impossible",'danger');

            }
            return back();
        }
        public function updatePays(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 11,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Pays modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeillePays(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Pays supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression du pays impossible",'danger');
            }
            return back();
        }
        public function destroyPays(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Pays supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allPays(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',11)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Pays supprimés avec success','success');

            }
            catch(Exception $e){
                toast('Supression des pays impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeillePays(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Pays restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration du pays impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeillePays(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',11)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Pays restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des pays impossible','danger');
            }
            return back();
        }
        public function destroyTousPays(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',11)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des pays éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des pays impossible','danger');
            }
            return back();
        }
    // LES PAYS FIN
    // LES PROFILS DEBUT
        public function indexProfil(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',13)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',13)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',13)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.profils.profil")->with($data);
        }
        public function indexCorbeilleProfil()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',13)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',13)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',13)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.profils.corbeilleprofil')->with($data);
        }
        public function storeProfil(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>13
                ]);
                toast("Profil Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  du profil impossible",'danger');

            }
            return back();
        }
        public function updateProfil(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 13,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Profil modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleProfil(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Profil supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression du profil impossible",'danger');
            }
            return back();
        }
        public function destroyProfil(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Profil supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allProfil(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',13)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Profils supprimés avec success','success');

            }
            catch(Exception $e){
                toast('Supression des profils impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleProfil(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Profil restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration du profil impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleProfil(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',13)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Profils restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des profils impossible','danger');
            }
            return back();
        }
        public function destroyTousProfil(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',13)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des profils éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des profils impossible','danger');
            }
            return back();
        }
    // LES PROFILS FIN
    // LES HABILITATION DEBUT
        public function indexHabilitation(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',14)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',14)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',14)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.habilitations.habilitation")->with($data);
        }
        public function indexCorbeilleHabilitation()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',14)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',14)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',14)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.habilitations.corbeillehabilitation')->with($data);
        }
        public function storeHabilitation(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>14
                ]);
                toast("Habilitation Ajoutée avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  de l'habilitation impossible",'danger');

            }
            return back();
        }
        public function updateHabilitation(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 14,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Habilitation modifiée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleHabilitation(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Habilitation supprimée avec success','success');

            }
            catch(Exception $e){
                toast("Supression de l'habilitation impossible",'danger');
            }
            return back();
        }
        public function destroyHabilitation(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Habilitation supprimée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allHabilitation(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',14)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Habilitations supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des habilitations impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleHabilitation(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Habilitation restaurée avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration de l'habilitation impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleHabilitation(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',14)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Habilitations restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des habilitations impossible','danger');
            }
            return back();
        }
        public function destroyTousHabilitation(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',14)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des habilitations éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des habilitations impossible','danger');
            }
            return back();
        }
    // LES HABILITATION FIN
    // LES CATEGORIES DEBUT
        public function indexCategorie(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',15)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',15)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',15)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.categories.categorie")->with($data);
        }
        public function indexCorbeilleCategorie()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',15)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',15)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',15)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.categories.corbeillecategorie')->with($data);
        }
        public function storeCategorie(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>15
                ]);
                toast("Categorie Ajoutée avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  de la categorie impossible",'danger');

            }
            return back();
        }
        public function updateCategorie(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 15,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Categorie modifiée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleCategorie(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Categorie supprimée avec success','success');

            }
            catch(Exception $e){
                toast("Supression de la categorie impossible",'danger');
            }
            return back();
        }
        public function destroyCategorie(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Categorie supprimée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allCategorie(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',15)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Categories supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des categories impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleCategorie(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Categorie restaurée avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration de la categorie impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleCategorie(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',15)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Categories restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des categories impossible','danger');
            }
            return back();
        }
        public function destroyTousCategorie(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',15)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des categories éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des categories impossible','danger');
            }
            return back();
        }
    // LES CATEGORIES FIN
    // LES GESTIONNAIRE DEBUT
        public function indexGestionnaire(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',16)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',16)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',16)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.gestionnaires.gestionnaire")->with($data);
        }
        public function indexCorbeilleGestionnaire()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',16)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',16)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',16)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.gestionnaires.corbeillegestionnaire')->with($data);
        }
        public function storeGestionnaire(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>16
                ]);
                toast("Gestionnaire Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  du gestionnaire impossible",'danger');

            }
            return back();
        }
        public function updateGestionnaire(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 16,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Gestionnaire modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleGestionnaire(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Gestionnaire supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression du gestionnaire impossible",'danger');
            }
            return back();
        }
        public function destroyGestionnaire(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Gestionnaire supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allGestionnaire(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',16)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Gestionnaires supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des gestionnaires impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleGestionnaire(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Gestionnaire restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration du Gestionnaire impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleGestionnaire(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',16)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Gestionnaires restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des gestionnaires impossible','danger');
            }
            return back();
        }
        public function destroyTousGestionnaire(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',16)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des gestionnaires éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des gestionnaires impossible','danger');
            }
            return back();
        }
    // LES GESTIONNAIRE FIN
    // LES EMMETEURS DEBUT
        public function indexEmmeteur(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',17)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',17)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',17)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.emmeteurs.emmeteur")->with($data);
        }
        public function indexCorbeilleEmmeteur()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',17)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',17)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',17)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.emmeteurs.corbeilleemmeteur')->with($data);
        }
        public function storeEmmeteur(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>17
                ]);
                toast("Emmeteur Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  de l'emmeteur impossible",'danger');

            }
            return back();
        }
        public function updateEmmeteur(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 17,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Emmeteur modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleEmmeteur(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Emmeteur supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression de l'emmeteur impossible",'danger');
            }
            return back();
        }
        public function destroyEmmeteur(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Emmeteur supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allEmmeteur(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',17)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Emmeteurs supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des emmeteurs impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleEmmeteur(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Emmeteur restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration de l'emmeteur impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleEmmeteur(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',17)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Emmeteurs restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des emmeteurs impossible','danger');
            }
            return back();
        }
        public function destroyTousEmmeteur(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',17)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des emmeteurs éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des emmeteurs impossible','danger');
            }
            return back();
        }
    // LES EMMETEURS FIN
    // LES DESTINATAIRES DEBUT
        public function indexDestinataire(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',18)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',18)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',18)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.destinataires.destinataire")->with($data);
        }
        public function indexCorbeilleDestinataire()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',18)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',18)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',18)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.destinataires.corbeilledestinataire')->with($data);
        }
        public function storeDestinataire(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>18
                ]);
                toast("Destinataire Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  de le destinataire impossible",'danger');

            }
            return back();
        }
        public function updateDestinataire(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 18,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Destinataire modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleDestinataire(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Destinataire supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression de le destinataire impossible",'danger');
            }
            return back();
        }
        public function destroyDestinataire(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Destinataire supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allDestinataire(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',18)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Destinataires supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des destinataires impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleDestinataire(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Destinataire restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration de le destinataire impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleDestinataire(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',18)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Destinataires restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des destinataires impossible','danger');
            }
            return back();
        }
        public function destroyTousDestinataire(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',18)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des destinataires éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des destinataires impossible','danger');
            }
            return back();
        }
    // LES DESTINATAIRES FIN
    // LES RECEVEURS DEBUT
        public function indexReceveur(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',19)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',19)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',19)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.receveurs.receveur")->with($data);
        }
        public function indexCorbeilleReceveur()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',19)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',19)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',19)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.receveurs.corbeillereceveur')->with($data);
        }
        public function storeReceveur(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>19
                ]);
                toast("Receveur Ajouté avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  de le receveur impossible",'danger');

            }
            return back();
        }
        public function updateReceveur(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 19,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Receveur modifié avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleReceveur(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Receveur supprimé avec success','success');

            }
            catch(Exception $e){
                toast("Supression de le receveur impossible",'danger');
            }
            return back();
        }
        public function destroyReceveur(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Receveur supprimé avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allReceveur(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',19)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Receveurs supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des receveurs impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleReceveur(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Receveur restauré avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration de le receveur impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleReceveur(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',19)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Receveurs restorés avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des receveurs impossible','danger');
            }
            return back();
        }
        public function destroyTousReceveur(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',19)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des receveurs éffectué avec success','success');

            }
            catch(Exception $e){
                toast('Supression des receveurs impossible','danger');
            }
            return back();
        }
    // LES RECEVEURS FIN
    // LES ENTITES DEBUT
        public function indexEntite(){
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',9)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',9)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('libelle')->get();
            $data['parametres'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',9)->orderBy('libelle')->get();
            return view("admins.gestions.parametrages.entites.entite")->with($data);
        }
        public function indexCorbeilleEntite()
        {
            //
            $data['ParametreTotal']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',9)->orderBy('code')->count();
            $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',9)->orderBy('code')->count();
            $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
            // $data['arrondissements']= Parametre::where('type_parametre_id','=',4)->orderBy('libelle')->get();
            $data['parametres']= Parametre::where('supprimer','=',1)->where('type_parametre_id','=',9)->orderBy('libelle')->get();
            return view('admins.gestions.parametrages.entites.corbeilleentite')->with($data);
        }
        public function storeEntite(Request $request)
        {

            $code = $request->code;
            $libelle = $request->libelle;
            $desc = $request->desc;
            $desc2 = $request->desc2;
            $desc3 = $request->desc3;
            $parent_id = $request->parent_id;
            $type_parametre_id = $request->type_parametre_id;
            try{
                Parametre::create([
                    'code'=>$code,
                    'libelle'=>$libelle,
                    'desc'=>$desc,
                    'desc2'=>$desc2,
                    'desc3'=>$desc3,
                    'parent_id'=>1,
                    'type_parametre_id'=>9
                ]);
                toast("Entité Ajoutée avec succès",'success');

            }
            catch(Exception $e){
                toast("Ajout  de l'entité impossible",'danger');

            }
            return back();
        }
        public function updateEntite(Request $request)
        {

            $Parametre = Parametre::findOrfail($request->id);
            $code= isset($request->code)?$request->code:$Parametre->code;
            $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
            $desc= isset($request->desc)?$request->desc:$Parametre->desc;
            $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;
            $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
            $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
            $parent_id= isset($request->parent_id)?$request->parent_id:$Parametre->parent_id;
            try{
                $Parametre->update([
                    'code' => $code,
                    'libelle' => $libelle,
                    'desc' => $desc,
                    'type_parametre_id' => 9,
                    'desc2' => $desc2,
                    'desc3' => $desc3,
                    'parent_id' => 1
                ]);
                toast("Entite modifiée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeilleEntite(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>1
                ]);
                toast('Entité supprimée avec success','success');

            }
            catch(Exception $e){
                toast("Supression de l'entité impossible",'danger');
            }
            return back();
        }
        public function destroyEntite(Request $request)
        {
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->delete();
                toast("Entité supprimée avec succès",'success');
            }catch(Exception $e){
                toast("Une ereur est survenue !",'error');
            }
            return back();
        }
        public function corbeille_allEntite(Request $request){
            $parametre = Parametre::where('supprimer', 0)->where('type_parametre_id','=',9)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>1
                    ]);
                }
                toast('Entités supprimées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des entités impossible','danger');
            }
            return back();
        }
        public function recupUnCorbeilleEntite(Request $request){
            $parametre = Parametre::findOrFail($request->id);
            try{
                $parametre->update([
                    'supprimer' =>0
                ]);
                toast('Entité restaurée avec success','primary');

            }
            catch(Exception $e){
                toast("Restauration de l'entité impossible",'danger');
            }
            return back();
        }
        public function recupTousCorbeilleEntite(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',9)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->update([
                        'supprimer' =>0
                    ]);
                }
                toast('Entités restorées avec success','primary');

            }
            catch(Exception $e){
                toast('Restauration des entités impossible','danger');
            }
            return back();
        }
        public function destroyTousEntite(Request $request){
            $parametre = Parametre::where('supprimer', 1)->where('type_parametre_id','=',9)->orderBy('code')->get();
            try{
                foreach($parametre as $value){
                    $value->delete();
                }
                toast('Supression des entités éffectuées avec success','success');

            }
            catch(Exception $e){
                toast('Supression des éffectuées impossible','danger');
            }
            return back();
        }
    // LES ENTITES FIN
}
