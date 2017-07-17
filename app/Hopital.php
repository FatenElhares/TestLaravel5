<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
  protected $table = 'Hopital';
  protected $primaryKey = 'id_Hopital';

  protected $fillable = ['nom','ville'];

  public $timestamps = false;


  public static function AddHopital($nom, $ville)
  {

  $newObj = new Hopital;
  $newObj->nom = $nom;
  $newObj->ville = $ville;

  $newObj->save();

  }

}
