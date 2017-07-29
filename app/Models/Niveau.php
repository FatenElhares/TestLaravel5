<?php

namespace App\Models;

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

    public static function getNiveauById($id)
    {
        return DB::table('Niveau')
            ->select('Niveau.*')
            ->where('id_Niveau', $id)
            ->first();
    }

    #pour evaluer ou faire des stat
    public static function ListeNiveau()
    {
        return DB::table('Niveau')
            ->select('Niveau.*')
            ->get();
    }


}
