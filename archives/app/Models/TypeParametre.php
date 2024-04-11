<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeParametre extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'libelle',
        'desc',
        'desc2',
        'desc3',
        'supprimer',
    ];

    public function parametres(){
        return $this->hasMany(Parametre::class, 'type_parametre_id', 'id');
    }
}
