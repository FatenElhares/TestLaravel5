<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
  protected $table = 'Privilege';
  protected $primaryKey = 'id_Privilege';

  protected $fillable = ['nom'];

  public $timestamps = false;



      public static function AddPrivilege($nom)
      {

      $newObj = new Privilege;
      $newObj->nom = $nom;
      $newObj->save();

      }

}
