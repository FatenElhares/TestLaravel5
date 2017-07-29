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

  return $newObj;

  }

  public function getHopitalById($id) {

       $test = [];
       $test[1] = $this->Hopital->id_Hopital;
       return $test;



  }

  #pour evaluer ou faire des stat
  public static function ListeHopital () {
    return DB::table('Hopital')
            ->select('Hopital.*')
            ->get();


}}
