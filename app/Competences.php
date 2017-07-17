<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competences extends Model
{
  protected $table = 'Competences';
  protected $primaryKey = 'id_Competences';

  protected $enseignant='id_Enseignant';

  protected $fillable = ['ethique','gestionnaire','organisation','collaboration','professionnalisme'];

  public $timestamps = false;


public static function AddCompetences($enseignant,$ethique,$gestionnaire,$organisation,$collaboration,$professionnalisme)
{

$newObj = new Competences;
$newObj->ethique = $ethique;
$newObj->gestionnaire = $ethique;
$newObj->organisation = $gestionnaire;
$newObj->collaboration = $collaboration;
$newObj->professionnalisme = $professionnalisme;
$newObj->id_Enseignant = $enseignant;
$newObj->save();

}



}
