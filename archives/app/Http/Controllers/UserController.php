<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function indexUser(){
        $data['UserTotal']=User::where('supprimer','=',0)->count();
        $data['UserTotalC']=User::where('supprimer','=',1)->count();
        $data['quartiers']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',5)->get();
        $data['profils']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',13)->get();
        $data['pays']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',11)->get();
        // $data['pays']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',11)->get();
        $data['users'] =User::where('supprimer','=',0)->orderBy('name')->get();
        return view('admins.gestions.users.personnels.personnel')->with($data);
    }
    public function indexCorbeilleUser(){
        $data['UserTotal']=User::where('supprimer','=',0)->count();
        $data['UserTotalC']=User::where('supprimer','=',1)->count();
        $data['quartiers']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',5)->get();
        $data['profils']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',13)->get();
        $data['pays']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',11)->get();
        // $data['pays']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',11)->get();
        $data['users'] =User::where('supprimer','=',1)->orderBy('name')->get();
        return view('admins.gestions.users.personnels.corbeillepersonnel')->with($data);
    }
    public function storeUser(Request $request){
        if(isset($request->photo) and !empty($request->photo)){

            $photo = Storage::putFile('public/images/users', $request->file('photo'));
        }else{
            $photo = "storage/images/users/user1.png";
        }
        $name = $request->name;
        $prenom = $request->prenom;
        $email=$request->email;
        $profil_id=$request->profil_id;
        $phone=$request->phone;
        $quartier_id=$request->quartier_id;
        $password=$request->password;
        try{
            User::create([
                'name'=>$name,
                'profil_id' => $profil_id,
                'phone' => $phone,
                'quartier_id' => $quartier_id,
                'prenom' => $prenom,
                'photo'=>$photo,
                'email'=>$email,
                'password' => Hash::make($request['password']),
            ]);
            toast('Utilisateur ajouteé avec success','success');

        }
        catch(Exception $e){
            toast("Problemme rencontré lors de l'ajout de l'utilisateur",'danger');
        }
        return back();
    }
    public function updateUser(Request $request){
        $user = User::findOrFail($request->id);
        if(isset($request->photo) and !empty($request->photo)){
            $photo = Storage::putFile('public/images/users', $request->file('photo'));
        }else{
            $photo = $user->photo;
        }
        $name= isset($request->name)?$request->name:$user->name;
        $profil_id= isset($request->profil_id)?$request->profil_id:$user->profil_id;
        $prenom= isset($request->prenom)?$request->prenom:$user->prenom;
        $phone= isset($request->phone)?$request->phone:$user->phone;
        $quartier_id= isset($request->quartier_id)?$request->quartier_id:$user->quartier_id;
        $email= isset($request->email)?$request->email:$user->email;

        if(!isset($request->password)){
            $password = $user->password;
        }
        else{
            $password = Hash::make($request->password);
        }
        try{
            $user->update([
                'name'=>$name,
                'prenom' => $prenom,
                'profil_id' => $profil_id,
                'photo'=>$photo,
                'phone'=>$phone,
                'quartier_id'=>$quartier_id,
                'email'=>$email,
                'password' => $password,

            ]);
            toast("Super ! Modifiaction de l'utilisateur éffectuée avec success ",'warning');
        }
        catch(Exception $e){
            toast("Modification de l'utilisateur impossible",'danger');
        }
        return back();

    }
    public function corbeilleUser(Request $request){
        $user = User::findOrFail($request->id);
        try{
            $user->update([
                'supprimer' =>1
            ]);
            toast('Utilisateur supprimé avec success','success');
        }
        catch(Exception $e){
            toast("Suppression de l'utilisateur impossible",'danger');
        }
        return back();
    }
    public function destroyUser(Request $request){
        $user = User::findOrFail($request->id);
        try{
            $user->delete();
            toast('Utilisateur supprimé avec success','success');
        }
        catch(Exception $e){
            toast("Impossible d'effectuer la suppression de cette utilisateur ",'Error Message');

        }
        return back();
    }
    public function corbeille_allUser(Request $request){
        $id= Auth::user()->id;
        $users = User::where('supprimer', 0)->where('id','!=',$id)->orderBy('name')->get();
        try{
            foreach($users as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Utilisateurs supprimés avec success','success');
        }
        catch(Exception $e){
            toast('suppression impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeilleUser(Request $request){
        $users = User::findOrFail($request->id);
        try{
            $users->update([
                'supprimer' =>0
            ]);
            toast('Utilisateur restauré avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function recupTousCorbeilleUser(Request $request){
        $user = User::where('supprimer', 1)->orderBy('name')->get();
        try{
            foreach($user as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Utilisateurs restaurés avec success','primary');
        }
        catch(Exception $e){
            toast('Restauration impossible','danger');
        }
        return back();
    }
    public function destroyTousUser(Request $request){
        $id=Auth::user()->id;
        $users = User::where('supprimer', 1)->where('id','!=',$id)->get();
        try{
            foreach($users as $value){
                $value->delete();
            }
            toast('Supression éffectué avec success','success');
        }
        catch(Exception $e){
            toast('Supression impossible','danger');
        }
        return back();
    }
    public function profilAdmin()
    {

        $data['quartiers']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',5)->get();
        $data['profils']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',13)->get();
        $data['pays']=Parametre::where('supprimer','=',0)->where('type_parametre_id','=',11)->get();
        $data['users']= User::where('supprimer','=',0)->where('id','=',Auth::user()->id)->get();
        return view('admins.gestions.users.profils.profil')->with($data);


    }
    public function aide()
    {

        return view('admins.menus.aide');


    }
    public function showRegistrationForm()
    {
        // Récupérer la liste des quartiers depuis la base de données
        $data['quartiers'] = Parametre::where('supprimer','=',0)->where('type_parametre_id','=',5)->get();
    dd($data['quartiers'] );
        // Passer la liste des quartiers à la vue
        return view('auth.register', $data);
    }
    public function create1()
{
    // Récupérer la liste des quartiers depuis la base de données
    $quartiers = Parametre::where('supprimer', 0)
                           ->where('type_parametre_id', 5)
                           ->get();

    return view('auth.register', ['quartiers' => $quartiers]);
}

}
