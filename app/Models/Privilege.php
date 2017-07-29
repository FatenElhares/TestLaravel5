<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $table = 'Privilege';
    protected $primaryKey = 'id_Privilege';

    protected $fillable = ['nom'];

    public $timestamps = false;


}
