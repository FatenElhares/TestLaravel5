<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
  protected $table = 'Enseignant';
  protected $primaryKey = 'id_Enseignant';

  protected $grade = 'id_Grade';
  protected $specialite = 'id_Specialite';
  protected $login = 'login';
  protected $password = 'password';


  protected $fillable = ['CIN','nom','prenom','passwordDecrypt','qr_code'];

  public $timestamps = false;




  public static function AddEnseignant( $grade ,$specialite , $login , $password ,$CIN,$nom,$prenom,$passwordDecrypt,$qr_code)
  {

  $newObj = new Enseignant;
  $newObj->grade = $grade;
  $newObj->specialite = $specialite;
  $newObj->login = $login;
  $newObj->password = $password;
  $newObj->CIN = $CIN;
  $newObj->prenom = $prenom;
  $newObj->passwordDecrypt = $passwordDecrypt;
  $newObj->qr_code = $qr_code;
  $newObj->nom = $nom;
  $newObj->save();
  }



    public static function getEnseignantById($id) {
      return DB::table('Enseignant')
              ->select('Enseignant.*')
              ->where('id_Enseignant',$id)
              ->first();
    }

    #pour evaluer ou faire des stat
    public static function ListeEnseignant () {
      return DB::table('Enseignant')
              ->select('Enseignant.*')
              ->get();
    }

}
