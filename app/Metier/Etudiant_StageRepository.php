<?php


namespace App\Metier;

use App\Models\Stage;
use App\Models\Etudiant_Stage;
use App\Models\Etudiant;


class Etudiant_StageRepository extends ResourceRepository
{

    public function __construct(Etudiant_Stage $session)
    {
        $this->model = $session;
    }

    public function addEtudiant_Stage($stageId, $etudiantId, $note,$motif)
    {
        $etudiant_stage = new Etudiant_Stage();

        $etudiant_stage->stageId = $stageId;
        $etudiant_stage->etudiantId = $etudiantId;
        $etudiant_stage->note = $note;
         $etudiant_stage->motif = $motif;
        return $etudiant_stage->save();
    }


    public function getAllEtudiant_StageTerminated()
    {
        return Etudiant_Stage::where("note", "=", "admis") ;

    }



public function getAllEtudiant($stageId)
{
    return Etudiant_Stage::where("id_stage", "=", $stageId)
      #  ->getList($stageId);
}


public function getAllStages($etudiantId)
{
    return Etudiant_Stage::where("id_etudiant", "=", $etudiantId)
        #  ->getList($etudiantId);
}



    public function isExistEtudiant_Stage($etudiant_stageId)
    {
        return Etudiant_Stage::where("id_Etudiant_Stage", "=", $etudiant_stageId)
            ->first();
    }

    public function deleteEtudiant_Stage($etudiant_stageId)
    {
        return Etudiant_Stage::where("id_Etudiant_Stage", "=", $etudiant_stageId)
            ->delete();
    }

    public function updateEtudiant_Stage ($etudiant_stageId)

    {
        $etudiant_stage = Etudiant_Stage::find($etudiant_stageId);

        $etudiant_stage->stageId = $stageId;
        $etudiant_stage->etudiantId = $etudiantId;
        $etudiant_stage->note = $note;
        $etudiant_stage->motif = $motif;

        return $etudiant_stage->save();
    }
}
