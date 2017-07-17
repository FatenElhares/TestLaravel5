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

  }

}
