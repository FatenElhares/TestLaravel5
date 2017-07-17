<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
  protected $table = 'Stage';
  protected $primaryKey = 'id_Stage';


  protected $hopital = 'id_Hopital';
  protected $service = 'id_Service';
  protected $etudiant = 'id_Etudiant';
  protected $enseignant = 'id_Enseignant';

  protected $fillable = ['note','Datedebut', 'Datefin'];

  public $timestamps = false;


  public static function AddSpecialite($hopital,$service,$etudiant,$enseignant,$note, $Datedebut, $Datefin)
  {

  $newObj = new Stage;
  $newObj->hopital = $hopital;
    $newObj->service = $service;
      $newObj->etudiant = $etudiant;
        $newObj->enseignant = $enseignant;
          $newObj->note = $note;
            $newObj->Datedebut = $Datedebut;
              $newObj->Datefin = $Datefin;

  $newObj->save();

  }
}
