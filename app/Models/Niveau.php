<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $table = 'Niveau';
    protected $primaryKey = 'id_Niveau';

    protected $fillable = ['nom'];

    public $timestamps = false;





}
