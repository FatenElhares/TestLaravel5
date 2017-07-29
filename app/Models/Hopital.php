<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    protected $table = 'Hopital';
    protected $primaryKey = 'id_Hopital';

    protected $fillable = ['nom', 'ville'];

    public $timestamps = false;


  
}
