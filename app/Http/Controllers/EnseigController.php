<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Competences;
use App\Enseignant_Privilege;
use App\Enseignant;
use App\Etudiant;
use App\Grade;
use App\Hopital;
use App\Niveau;
use App\Privilege;
use App\Service;
use App\Specialite;
use App\Stage;

class EnseigController extends Controller
{

    public $message;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->message = "Hey, you've made a hello world controller view in Laravel 5 ;)";
    }

    /**
     * Show the helloworld page.
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function  StageManagement(Request $request){

      $Stage = Stage::all();
      $result = [];

      $idstage=request->id;
      $note=request->note;
      $stage=DonnerNote($idstage, $note);
      return response()->json(["message"=> $stage],200);
      }


      public function  CompetancesManagement(Request $request){

        $etudiant=$request->idetudiant;

        $Competences = Competences::all();
        $result = [];

        $new = new Competences;
        $new::Create($etudiant,9,988,9,9,14);

        foreach ($Competences as $each) {
            $result[] = $each;
        }
            return response()->json(["message"=> $result],200);
        }


        public function  PtofilManagement(Request $request){

      
          }
}
