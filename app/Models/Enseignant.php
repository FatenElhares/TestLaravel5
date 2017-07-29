<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $table = 'Enseignant';
    protected $primaryKey = 'id_Enseignant';

    protected $grade = 'id_Grade';
    protected $specialite = 'id_Specialite';
    protected $login = 'login';
    protected $password = 'password';


    protected $fillable = ['CIN', 'nom', 'prenom', 'passwordDecrypt', 'qr_code'];

    public $timestamps = false;




  

}
