<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Administrateur extends Controller
{

    public function createstage(Request $request )
        {
          // HOPITAL
          DB::table('Hopital')->insert(['nom'=>"test" ,'ville'=>"test" ]);
          $hopitalIdentity = DB::getPdo()->lastInsertId();
          print_r("hopitalIdentity".$hopitalIdentity);
          // SERVICE
          DB::table('Service')->insert(['nomservice'=>"a service", "id_Hopital" => $hopitalIdentity ]);
          print_r('then');
          $serviceIdentity = DB::getPdo()->lastInsertId();
          print_r("serviceIdentity".$serviceIdentity);



          //Grade
          DB::table('Grade')->insert(['nom'=>"a service" ]);
          print_r('then');
          $gradeIdentity = DB::getPdo()->lastInsertId();
          print_r("gradeIdentity".$gradeIdentity);

          //SPECIALITE
          DB::table('Specialite')->insert(['nom'=>"a service" ]);
          print_r('then');
          $specialiteIdentity = DB::getPdo()->lastInsertId();
          print_r("specialiteIdentity".$specialiteIdentity);


          // ENSEIGNANT
          DB::table('Enseignant')->insert(['CIN'=>"a service", 'nom'=>"a service", 'prenom'=>"a service",
'passwordDecrypt'=>"a service",
'qr_code'=>"a service",
"id_Grade" => $gradeIdentity ,
"id_Specialite" => $specialiteIdentity ,
'login'=>"a service",
'password'=>"a service"]);
          print_r('then');
          $enseignantIdentity = DB::getPdo()->lastInsertId();
          print_r("enseignantIdentity".$enseignantIdentity);



          // ETUDIANT
          DB::table('Etudiant')->insert(['nom'=>"a service"]);
          print_r('then');
          $etudiantIdentity = DB::getPdo()->lastInsertId();
          print_r("etudiantIdentity".$etudiantIdentity);



          // STAGE
          DB::table('Stage')->insert(['note'=>"a service",'Date debut'=>"a service",'Date fin'=>"a service","id_Hopital" => $hopitalIdentity , "id_Service" => $serviceIdentity , "id_Etudiant" => $etudiantIdentity,"id_Enseignant" => $enseignantIdentity]);
          print_r('then');
          $stageIdentity = DB::getPdo()->lastInsertId();
          print_r("stageIdentity".$stageIdentity);




        $users = DB::table('Stage')->get();
        return response()->json(["message"=> "hiiiii $users "], 200);
        }


}
