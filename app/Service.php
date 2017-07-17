<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $table = 'Service';
  protected $primaryKey = 'id_Service';


  protected $hopital = 'id_Hopital';


  protected $fillable = ['nomservice'];

  public $timestamps = false;


  public static function AddService($nomservice,$hopital )
  {

  $newObj = new Service;
  $newObj->nomservice = $nomservice;
  $newObj->hopital = $hopital;

  $newObj->save();

  }
}
