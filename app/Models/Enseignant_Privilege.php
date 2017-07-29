<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enseignant_Privilege extends Model
{
    protected $table = 'Enseignant_Privilege';
    protected $primaryKey = 'id_Enseignant_Privilege';


    protected $enseignant = 'id_Enseignant';

    protected $privilege = 'id_Privilege';

    public $timestamps = false;


}
