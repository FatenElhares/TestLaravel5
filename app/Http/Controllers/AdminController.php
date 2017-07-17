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


class AdminController extends Controller
{
  public function  StageManagement(Request $request){
    #Type 1 pour l'ajout d'un stage
 if ($request->type=1)
 {
    $Stage = Stage::all();
    $result = [];
    Stage::AddStage(1,1,1,'aaa','bbb','ccc');
    return response()->json(["message"=> $result],200); }

#Type 2 pour l'ajout afficher liste stages
    if ($request->type=2)
    {
       $Stage = Stage::all();
       $result2 = array [stage];
       $result2=Stage::ListStage();
       return response()->json(["message"=> $result2],200); }
    }

#Type 3 pour modification d'un stage
if ($request->type=2)
{
// still not done
}


}
