<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $table = 'Service';
  protected $primaryKey = 'id_Service';


  #protected $hopital = 'id_Hopital';


  protected $fillable = ['nomservice','id_Hopital'];

  public $timestamps = false;


  public static function AddService($nomservice,$id_Hopital )
  {

  $newObj = new Service;
  $newObj->nomservice = $nomservice;
  $newObj->id_Hopital = $id_Hopital;

  $newObj->save();
return $newObj;
  }


  public static function getPrivilegeById($id) {
    return DB::table('Service')
            ->select('Service.*')
            ->where('id_Service',$id)
            ->first();
  }

  #pour evaluer ou faire des stat
  public static function ListeService () {
    return DB::table('Service')
            ->select('Service.*')
            ->get();
  }


}
