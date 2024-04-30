<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'prenom' => $input['prenom'],
            'email' => $input['email'],
            'quartier_id' => $input['quartier_id'],
            'profil_id' => 132,
            'password' => Hash::make($input['password']),
        ]);
        if (isset($input['photo'])) {
            // Stocker l'image dans le dossier public/storage/images/users
            $photo = $input['photo']->store('images/users', 'public');
            // $photo = Storage::putFile('public/stockages/images/users');
            // Enregistrer le chemin de l'image dans la base de données
            $user->photo = $photo;
            $user->save();
        }

        return $user;

    }
}
