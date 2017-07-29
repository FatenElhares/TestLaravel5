<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant_Privilege extends Model
{
  protected $table = 'Enseignant_Privilege';
  protected $primaryKey = 'id_Enseignant_Privilege';


  protected $enseignant = 'id_Enseignant';

  protected $privilege = 'id_Privilege';

  public $timestamps = false;


  public static function AddEnseig_Pri($enseignant,$privilege)
  {

  $newObj = new Enseignant_Privilege;
  $newObj->enseignant = $enseignant;
  $newObj->privilege = $privilege;
  $newObj->save();
  }

  public static function getEnseigPriveById($id) {
    return DB::table('Enseignant_Privilege')
            ->select('Enseignant_Privilege.*')
            ->where('id_Enseignant_Privilege',$id)
            ->first();
  }

  #pour evaluer ou faire des stat
  public static function ListeEnseignantPrivilege () {
    return DB::table('Enseignant_Privilege')
            ->select('Enseignant_Privilege.*')
            ->get();
  }
}
