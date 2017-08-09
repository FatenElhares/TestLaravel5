<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table = 'Etudiant';
    protected $primaryKey = 'id_Etudiant';

    protected $fillable = ['id_Niveau','id_Competences','nom', 'prenom', 'CIN', 'carte_Etudiant', 'email', 'active', 'confirmation_code', 'qr_code'];


    public $timestamps = false;





}
