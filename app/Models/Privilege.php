<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $table = 'Privilege';
    protected $primaryKey = 'id_Privilege';

    protected $fillable = ['nom'];

    public $timestamps = false;


    public static function AddPrivilege($nom)
    {

        $newObj = new Privilege;
        $newObj->nom = $nom;
        $newObj->save();

    }


    public static function getPrivilegeById($id)
    {
        return DB::table('Privilege')
            ->select('Privilege.*')
            ->where('id_Privilege', $id)
            ->first();
    }

    #pour evaluer ou faire des stat
    public static function ListePrivilege()
    {
        return DB::table('Privilege')
            ->select('Privilege.*')
            ->get();
    }

}
