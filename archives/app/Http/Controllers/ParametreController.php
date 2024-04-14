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
}
