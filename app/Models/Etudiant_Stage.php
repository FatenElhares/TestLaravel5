<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abbes
 * Date: 29/07/2017
 * Time: 12:58
 */

namespace App\Models;


class Etudiant_Stage
{
    protected $table = 'Stage';
    protected $primaryKey = 'id_Etudiant_Stage';


    protected $fillable = ["id_Stage", "id_Etudiant", "note","motif"];

    public $timestamps = false;

}
