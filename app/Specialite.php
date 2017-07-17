<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
  protected $table = 'Specialite';
  protected $primaryKey = 'id_Specialite';

  protected $fillable = ['nom'];

  public $timestamps = false;

  public static function AddSpecialite($nom)
  {

  $newObj = new Specialite;
  $newObj->nom = $nom;


  $newObj->save();

  }
}
