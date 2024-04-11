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
}
