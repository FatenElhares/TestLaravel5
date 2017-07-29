<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'Grade';
    protected $primaryKey = 'id_Grade';

    protected $fillable = ['nom'];

    public $timestamps = false;




  


}
