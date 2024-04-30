<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Archive extends Model
{
    use HasFactory;
    protected $fillable = [ 'code',
                            'libelle',
                            'objet',
                            'desc',
                            'desc2',
                            'emetteur',
                            'date_emission',
                            'destinataire',
                            'date_reception',
                            'receveur',
                            'date',
                            'ampillation',
                            'type_fichier',
                            'fichier',
                            'gestionaire_id',
                            'emeteur_id',
                            'destinataire_id',
                            'receveur_id',
                            'type_id',
                            'categorie_id',
                            'poste_id',
                            'user_id',
                            'supprimer'

    ];
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date('Y-m-d', strtotime($value));
    }

    public function type(){
        return $this->belongsTo(Parametre::class, 'type_id', 'id');
    }

    public function categorie(){
        return $this->belongsTo(Parametre::class, 'categorie_id', 'id');
    }
    public function gestionaire(){
        return $this->belongsTo(Parametre::class, 'gestionaire_id', 'id');
    }
    public function poste(){
        return $this->belongsTo(Parametre::class, 'poste_id', 'id');
    }
    public function legestionaire(){
        return $this->belongsTo(Parametre::class, 'gestionaire_id', 'id');
    }
    public function lemetteur(){
        return $this->belongsTo(Parametre::class, 'emeteur_id', 'id');
    }
    public function ledestinataire(){
        return $this->belongsTo(Parametre::class, 'destinataire_id', 'id');
    }
    public function lereceveur(){
        return $this->belongsTo(Parametre::class, 'receveur_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getLaDateEmissionAttribute(){
        return date('d/m/Y', strtotime($this->attributes['date_emission']));
    }
    public function getLaDateReceptionAttribute(){
        return date('d/m/Y', strtotime($this->attributes['date_reception']));
    }

    public function getLaDateAjoutAttribute(){
        return date('d/m/Y', strtotime($this->attributes['date']));
    }

    public function getLienFichierAttribute(){
        $lien = "";
        if($this->attributes['type_fichier']==1){
            if(Auth::user()->id==$this->attributes['user_id']){
                $lien = $this->attributes['fichier'];
            }
        }else{
            $lien = Storage::url($this->attributes['fichier']);
        }
        return $lien;
    }

    public function getIconeAttribute(){
        $icone = '1.png';
        $mim = Storage::mimeType($this->attributes['fichier']);
        switch ($mim) {
            case 'application/pdf':
                $icone = '6.png';
                break;
            case 'application/doc':
                $icone = '8.png';
                break;
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                $icone = '5.png';
                break;
            case 'application/xls':
                $icone = '5.png';
                break;
            case 'application/txt':
                $icone = '10.png';
                break;
            case 'image/png':
                $icone = '12.png';
                break;
            case 'image/jpg':
                $icone = '12.png';
                break;
            case 'image/jpeg':
                $icone = '12.png';
                break;

            default:
                $icone = '1.png';
                break;
        }
        return $icone;
    }
    // Modèle Archive.php


    // MON CODE DEBUT
        public function getIconAttribute()
        {

            $extension = pathinfo($this->attributes['fichier'], PATHINFO_EXTENSION);

            switch ($extension) {
                case 'pdf':
                    return asset('glbal/autres/iconarchives/pdf.png');
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif':
                    return asset('glbal/autres/iconarchives/picture.png');
                case 'mp4':
                case 'avi':
                case 'mov':
                    return asset('glbal/autres/iconarchives/content.png');
                case 'doc':
                    return asset('glbal/autres/iconarchives/doc.png');
                case 'txt':
                    return asset('glbal/autres/iconarchives/txt-file.png');
                case 'xlsx':
                    return asset('glbal/autres/iconarchives/xls.png');
                default:
                    return asset('glbal/autres/iconarchives/picture.png');
            }
        }
    // MON CODE FIN

//     $icone = '1.png';
//     $mim = Storage::mimeType($this->attributes['fichier']);
//     switch ($mim) {
//         case 'application/pdf':
//             $icone = '6.png';
//             break;
//         case 'application/doc':
//             $icone = '8.png';
//             break;
//         case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
//             $icone = '5.png';
//             break;
//         case 'application/xls':
//             $icone = '5.png';
//             break;
//         case 'application/txt':
//             $icone = '10.png';
//             break;
//         case 'image/png':
//             $icone = '12.png';
//             break;
//         case 'image/jpg':
//             $icone = '12.png';
//             break;
//         case 'image/jpeg':
//             $icone = '12.png';
//             break;

//         default:
//             $icone = '1.png';
//             break;
//     }
//     return $icone;
// }



}
