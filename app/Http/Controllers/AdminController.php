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

  ###############################################################################
  public function  StageManagement(Request $request){

#Type 1 pour l'ajout d'un stage
 if ($request->type==1)
 {
    $obj = new Stage ();
    $obj=Stage::AddStage(1,1,1,1,'aaa','bbb','ccc' );
    return response()->json(["message"=> $obj],200);
  }

#Type 2 pour afficher liste stages
if ($request->type==2)
    {
       $liste = Hopital::all();
       return response()->json(["message"=> $liste],200);
    }

#Type 3 pour modification d'un stage
if($request->type==3)
{  $id=$request->id ;
// still not done
}


if ($request->type==4)
{
  $Stage = Stage::all();
    $id=$request->id ;

  Stage::destroy($id);
    return response()->json(["message"=> "Stage is deleted successfully"],200); }

  #function destroy from provider Stage can delete an element from tablme Stage
}

##############################################################################

  public function  HopitalManagement(Request $request)
  {

     if ($request->type==1)
     {
        $obj = new Hopital ();
        $obj=Hopital::AddHopital($request->nom,$request->ville);
        return response()->json(["message"=> $obj],200);
      }
    #Type 2 pour afficher liste stages
    if ($request->type==2)
        {
           $liste = Hopital::all();
           return response()->json(["message"=> $liste],200);
        }
    #Type 3 pour modification d'un stage
    if($request->type==3)
    {
      $obj = new Hopital ();
      $id=$request->id ;

      $obj=$obj.getHopitalById($id);
      return response()->json(["message"=> $obj],200);


    // still not done
    }


    if ($request->type==4)
    {
      $Stage = Stage::all();
        $id=$request->id ;

      Stage::destroy($id);
        return response()->json(["message"=> "Stage is deleted successfully"],200); }
  }




    public function  EtudiantManagement(Request $request)
    {}
      public function  EnseignantManagement(Request $request)
      {}


}
