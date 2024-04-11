<?php

namespace App\Http\Controllers;

use App\Models\TypeParametre;
use App\Http\Requests\StoreTypeParametreRequest;
use App\Http\Requests\UpdateTypeParametreRequest;
use Exception;
use Illuminate\Http\Request;

class TypeParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $data['types_parametres'] = TypeParametre::orderBy('code')->get();

        // return view("typeparametres.index")->with($data);

        $data['TypeParametreTotal']= TypeParametre::where('supprimer','=',0)->orderBy('code')->count();
        $data['TypeParametreTotalC']= TypeParametre::where('supprimer','=',1)->orderBy('code')->count();
        $data ['typeparametres'] = TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
        return view("admins.gestions.parametrages.typeparametres.typeparametre")->with($data);

    }
    public function indexCorbeille()
    {
        $data['TypeParametreTotal']= TypeParametre::where('supprimer','=',0)->orderBy('code')->count();
        $data['TypeParametreTotalC']= TypeParametre::where('supprimer','=',1)->orderBy('code')->count();
        $data ['typeparametres'] = TypeParametre::where('supprimer','=',1)->orderBy('code')->get();

        return view('admins.gestions.parametrages.typeparametres.corbeilletypeparametre')->with($data);


    }


    public function ajouter()
    {
        $data['types'] = TypeParametre::orderBy('code')->get();
        return view("typeparametres.ajouter")->with($data);
    }
    public function details($id)
    {
        $data['parametre'] = TypeParametre::findOrFail($id);
        return view("typeparametres.details")->with($data);
    }
    public function modifier($id)
    {
        $data['parametre'] = TypeParametre::findOrFail($id);
        return view("typeparametres.modifier")->with($data);
    }
    public function supprimer($id)
    {
        $data['parametre'] = TypeParametre::findOrFail($id);
        return view("typeparametres.supprimer")->with($data);
    }
    public function store(Request $request)
    {
        $code= $request->code;
        $libelle= $request->libelle;
        $desc= $request->desc;
        $desc2= $request->desc2;
        $desc3= $request->desc3;
        try{
            TypeParametre::create([
                'code' => $code,
                'libelle' => $libelle,
                'desc' => $desc,
                'desc2' => $desc2,
                'desc3' => $desc3
            ]);

            toast("Type de parametre ajouté avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return back();
    }

    public function update(Request $request)
    {

        $Parametre = TypeParametre::findOrfail($request->id);
        $code= isset($request->code)?$request->code:$Parametre->code;
        $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
        $desc= isset($request->desc)?$request->desc:$Parametre->desc;
        $desc2= isset($request->desc2)?$request->desc2:$Parametre->desc2;
        $desc3= isset($request->desc3)?$request->desc3:$Parametre->desc3;
        try{
            $Parametre->update([
                'code' => $code,
                'libelle' => $libelle,
                'desc' => $desc,
                'desc2' => $desc2,
                'desc3' => $desc3
            ]);
            toast("Type de parametre modifié avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return back();
    }
    public function corbeille(Request $request)
    {
        //aller faire la modification de l'element
        $typeParametre = TypeParametre::findOrFail($request->id);

        try {
           $typeParametre->update([
                'supprimer'=>1

            ]);
            toast('Type de Parametre supprimé avec success','danger');
                }
        catch(Exception $e) {
            toast('Supression du Type de Parametre impossible','danger');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $parametre = TypeParametre::findOrFail($request->id);
        try{
            $parametre->delete();
            toast("Type de parametre supprimé avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return back();
        // return redirect()->route('Types-Parameters');
    }
    public function corbeille_all(Request $request){
        $typeParametre = TypeParametre::where('supprimer', 0)->orderBy('code')->get();
        try{
            foreach($typeParametre as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Types de Paramétre supprimés avec success','danger');

        }
        catch(Exception $e){
            toast('Supression des Types de Parametre impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $typeParametre = TypeParametre::findOrFail($request->id);
        try{
            $typeParametre->update([
                'supprimer' =>0
            ]);
            toast('Type de Parametre restoré avec success ','success');

        }
        catch(Exception $e){
            toast('Restauration du type de Parametre impossible','danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $typeParametre = TypeParametre::where('supprimer', 1)->orderBy('code')->get();
        try{
            foreach($typeParametre as $value){
                $value->update([
                    'supprimer' =>0
                ]);
                toast('Types de Paramétres restaurés avec success','primary');
            }
            toast('Types de Parametres restaurés avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration des Types de Paramtre impossible','danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $typeParametre = TypeParametre::where('supprimer', 1)->get();
        try{
            foreach($typeParametre as $value){
                $value->delete();
            }
            toast('Supression des Types de Parametre éffectuée avec success','success');

        }
        catch(Exception $e){

            // toast('Supression des Type de Parametre impossible','warning');
        }
        return back();
    }
}
