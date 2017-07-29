<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competences extends Model
{
    protected $table = 'Competences';
    protected $primaryKey = 'id_Competences';

    protected $enseignant = 'id_Enseignant';

    protected $fillable = ['ethique', 'gestionnaire', 'organisation', 'collaboration', 'professionnalisme'];

    public $timestamps = false;



}
