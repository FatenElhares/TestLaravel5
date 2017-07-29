<?php

namespace App\Models;
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

    public static function getServiceById($id)
    {
        return DB::table('Specialite')
            ->select('Specialite.*')
            ->where('id_Specialite', $id)
            ->first();
    }

    #pour evaluer ou faire des stat
    public static function ListeService()
    {
        return DB::table('Specialite')
            ->select('Specialite.*')
            ->get();
    }

}
