<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table = 'Etudiant';
    protected $primaryKey = 'id_Etudiant';

    protected $fillable = ['nom', 'prenom', 'CIN', 'carte_Etudiant', 'email', 'active', 'confirmation_code', 'qr_code'];
    protected $niveau = 'id_Niveau';
    protected $competences = 'id_Competences';

    public $timestamps = false;




}
