<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use App\Models\Parametre;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
  



    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'quartier_id' => ['required', 'exists:parametres,id'], // Assurez-vous que quartier_id existe dans la table parametres
        ])->validate();

        // Vérifier si $input['quartier_id'] est défini avant de l'utiliser
        $quartierId = $input['quartier_id'] ?? null;

        // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $input['name'],
            'prenom' => $input['prenom'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'quartier_id' => $quartierId,
            'profil_id' => 132,
            'password' => Hash::make($input['password']),
        ]);

        // Stocker la photo de l'utilisateur s'il est fourni
        if (isset($input['photo'])) {
            $photo = $input['photo']->store('images/users', 'public');
            $user->photo = $photo;
            $user->save();
        }

        return $user;
    }
}

