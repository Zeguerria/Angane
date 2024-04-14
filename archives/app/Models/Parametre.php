<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'libelle',
        'desc',
        'supprimer',
        'desc2',
        'desc3',
        'parent_id',
        'type_parametre_id',
    ];

    public function typearchives(){
        return $this->hasMany(Archive::class, 'type_id', 'id');
    }

    public function categoriearchives(){
        return $this->hasMany(Archive::class, 'categorie_id', 'id');
    }
    public function gestionairearchives(){
        return $this->hasMany(Archive::class, 'gestionaire_id', 'id');
    }

    public function type_parametre(){
        return $this->belongsTo(TypeParametre::class, 'type_parametre_id', 'id');
    }


    // Relation pour obtenir les communes d'une province
    public function communes()
    {
        return $this->hasMany(Parametre::class, 'parent_id');
    }

    // Relation pour obtenir la province d'une commune
    public function province()
    {
        return $this->belongsTo(Parametre::class, 'parent_id');
    }
    // Relation pour obtenir les arrondissments d'une commune
    public function arrondissents()
    {
        return $this->hasMany(Parametre::class, 'parent_id');
    }
    // Relation obtenir la commune d'un arrondissement
    public function commune()
    {
        return $this->belongsTo(Parametre::class, 'parent_id');
    }
    //Relation pour obtenir les quartiers de l'arrdondissement
    public function quartiers()
    {
        return $this->hasMany(Parametre::class, 'parent_id');
    }
    // Relation pour obtenir l'arrondissement d'un quartier
    public function arrondissement()
    {
        return $this->belongsTo(Parametre::class, 'parent_id');
    }
}
