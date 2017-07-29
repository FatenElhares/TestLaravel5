<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
  protected $table = 'Grade';
  protected $primaryKey = 'id_Grade';

  protected $fillable = ['nom'];

  public $timestamps = false;



  public static function AddGrade($nom)
  {

  $newObj = new Grade;
  $newObj->nom = $nom;

  $newObj->save();

  return $newObj;

  }

  public static function getGradeById($id) {
    return DB::table('Grade')
            ->select('Grade.*')
            ->where('id_Grade',$id)
            ->first();
  }

  #pour evaluer ou faire des stat
  public static function ListeGrade () {
    return DB::table('Grade')
            ->select('Grade.*')
            ->get();
  }


}
