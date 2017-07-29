<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'Stage';
    protected $primaryKey = 'id_Stage';


    protected $fillable = ['date_debut', 'date_fin', 'id_Enseignant', 'id_Hopital', 'id_Service'];

    public $timestamps = false;




}
