<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParametreRequest;
use App\Http\Requests\UpdateParametreRequest;
use App\Models\Parametre;
use App\Models\TypeParametre;
use Exception;
use Illuminate\Http\Request;

class ParametreIdController extends Controller
{

    public function index($id)
    {
        $data['type'] = TypeParametre::findOrFail($id);
        $data['parametres'] = Parametre::where('type_parametre_id', $id)->orderBy('code')->get();
        return view("parametres.id.index")->with($data);
    }

    public function ajouter($id)
    {
        $data['type'] = TypeParametre::findOrFail($id);
        return view("parametres.id.ajouter")->with($data);
    }
    public function details($id)
    {
        $data['parametre'] = Parametre::findOrFail($id);
        $data['type'] = TypeParametre::findOrFail($data['parametre']->type_parametre_id);
        return view("parametres.id.details")->with($data);
    }
    public function modifier($id)
    {
        $data['parametre'] = Parametre::findOrFail($id);
        $data['type'] = TypeParametre::findOrFail($data['parametre']->type_parametre_id);
        return view("parametres.id.modifier")->with($data);
    }
    public function supprimer($id)
    {
        $data['parametre'] = Parametre::findOrFail($id);
        $data['type'] = TypeParametre::findOrFail($data['parametre']->type_parametre_id);
        return view("parametres.id.supprimer")->with($data);
    }
    public function store(StoreParametreRequest $request)
    {
        try{
            Parametre::create(['code' => $request->code,
                            'libelle' => $request->libelle,
                            'desc' => $request->desc,
                            'type_parametre_id' => $request->type_parametre_id,
                            'desc2' => $request->desc2,
                            'desc3' => $request->desc3
            ]);

            toast("Donnée ajoutée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return back();
    }

    public function update(UpdateParametreRequest $request)
    {

        $Parametre = Parametre::findOrfail($request->id);
        try{
            $Parametre->update(['code' => $request->code,
                                'libelle' => $request->libelle,
                                'desc' => $request->desc,
                                'type_parametre_id' => $request->type_parametre_id,
                                'desc2' => $request->desc2,
                                'desc3' => $request->desc3
            ]);
            toast("Donnée modifiée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $parametre = Parametre::findOrFail($request->id);
        try{
            $parametre->delete();
            toast("Donnée supprimée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue !",'error');
        }
        return redirect()->route('Parametres ID',['id' => $request->type_parametre_id]);
    }
}
