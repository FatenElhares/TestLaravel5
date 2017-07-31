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

    public function addEtudiant_Stage($stageId, $etudiantId, $note)
    {
        $etudiant_stage = new Etudiant_Stage();

        $etudiant_stage->stageId = $stageId;
        $etudiant_stage->etudiantId = $etudiantId;
        $etudiant_stage->note = $note;

        return $etudiant_stage->save();
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

    public function

    {
        $etudiant_stage = Etudiant_Stage::find($etudiant_stageId);

        $etudiant_stage->stageId = $stageId;
        $etudiant_stage->etudiantId = $etudiantId;
        $etudiant_stage->note = $note;

        return $etudiant_stage->save();
    }
}
