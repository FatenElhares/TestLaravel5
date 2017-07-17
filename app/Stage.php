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


  public static function AddStage($hopital,$service,$etudiant,$enseignant,$note, $Datedebut, $Datefin)
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


  public static function DonnerNote($id, $note)
  {
  $Obj = new Stage;
  $Obj = getStageById($id)
  $Obj->note=$note;

  $newObj->save();

  }

  public function Donnernote($id , $note) {
  #  $stage = Stage::find($id);
  #  $stage->where('note', $note)->update(array('image' => 'asdasd'));

    $stage = Stage::find($id);

if($stage) {
    $stage->note = $note;
    $stage->save();
}
return stage ;
}


  public static function getStageById($id) {
    return DB::table('Stage')
            ->select('Stage.*')
            ->where('id_Stage',$id)
            ->first();
}


public static function ListeStage($id) {
    return DB::table('Stage')
            ->select('Stage.*')
            ->get();
}

}
