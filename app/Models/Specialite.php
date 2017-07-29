<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $table = 'Specialite';
    protected $primaryKey = 'id_Specialite';

    protected $fillable = ['nom'];

    public $timestamps = false;



}
