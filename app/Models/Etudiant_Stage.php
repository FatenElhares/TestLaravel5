<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant_Stage extends Model
{
    protected $table ='Etudiant_Stage';
    protected $primaryKey = 'id_Etudiant_Stage';


    protected $fillable = ["id_Stage", "id_Etudiant", "note","motif"];

    public $timestamps = false;

}
