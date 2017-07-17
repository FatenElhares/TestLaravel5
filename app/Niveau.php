<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $table = 'Niveau';
    protected $primaryKey = 'id_Niveau';

    protected $fillable = ['nom'];

    public $timestamps = false;


    public static function AddNiveau($nom)
    {

    $newObj = new Niveau;
    $newObj->nom = $nom;
    $newObj->save();

    }

}
