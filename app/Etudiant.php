<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
  protected $table = 'Etudiant';
  protected $primaryKey = 'id_Etudiant';

  protected $fillable = ['nom','prenom', 'CIN','carte_Etudiant','email','active','confirmation_code','qr_code'];
  protected $niveau = 'id_Niveau';
  protected $competences = 'id_Competences';

  public $timestamps = false;



  public static function AddEtudiant( $niveau ,$competences , $nom,$prenom, $CIN,$carte_Etudiant,$email,$active,$confirmation_code,$qr_code)
  {

  $newObj = new Etudiant;
  $newObj->$competences = $competences;
  $newObj->$niveau = $niveau;
    $newObj->nom = $nom;
    $newObj->prenom = $prenom;
  $newObj->CIN = $CIN;
  $newObj->confirmation_code = $confirmation_code;
    $newObj->carte_Etudiant = $carte_Etudiant;
  $newObj->email = $email;
  $newObj->active = $active;
  $newObj->qr_code = $qr_code;

  $newObj->save();

  }

  public static function getEtudiantById($id) {
    return DB::table('Etudiant')
            ->select('Etudiant.*')
            ->where('id_Etudiant',$id)
            ->first();
  }

  #pour evaluer ou faire des stat
  public static function ListeEtudiant () {
    return DB::table('Etudiant')
            ->select('Etudiant.*')
            ->get();
  }

}
