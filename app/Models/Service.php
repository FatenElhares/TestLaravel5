<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'Service';
    protected $primaryKey = 'id_Service';


    #protected $hopital = 'id_Hopital';


    protected $fillable = ['nomservice', 'id_Hopital'];

    public $timestamps = false;




  


}
