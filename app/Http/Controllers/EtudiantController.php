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

class HelloworldController extends Controller
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
    public function helloMetho(Request $request)
    {

        return view('helloworld', [
            'message' => $this->message
        ]);
    }

  public function  index(Request $request){

    $Competences = Competences::all();
    $result = [];

        $newNiveau = new Competences;
    $newNiveau->ethique = 2;
    $newNiveau->gestionnaire = 3;
    $newNiveau->organisation = 4;
    $newNiveau->collaboration = 5;
    $newNiveau->professionnalisme = 6;
    $newNiveau->id_Enseignant = 6;


    $newNiveau->save();

    foreach ($Competences as $each) {
        $result[] = $each;
    }
        return response()->json(["message"=> $result],200);
    }
}
