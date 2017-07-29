<?php

/**
 * Created by IntelliJ IDEA.
 * User: Abbes
 * Date: 29/07/2017
 * Time: 12:03
 */

namespace App\Metier;

use App\Models\Stage;

class StageRepository extends ResourceRepository
{


    public function __construct(Stage $session)
    {
        $this->model = $session;
    }

    public function addStage($hopitalId, $serviceId, $enseignantId, $startDate, $endDate)
    {
        $stage = new Stage();

        $stage->id_Hopital = $hopitalId;
        $stage->id_Service = $serviceId;
        $stage->id_Enseignant = $enseignantId;
        $stage->date_debut = $startDate;
        $stage->date_fin = $endDate;

        return $stage->save();
    }

    public function isExistStage($stageId)
    {
        return Stage::where("id_Stage", "=", $stageId)
            ->first();
    }

    public function deleteStage($stageId)
    {
        return Stage::where("id_Stage", "=", $stageId)
            ->delete();
    }

    public function updateStage($stageId, $hopitalId, $serviceId, $enseignantId, $startDate, $endDate)
    {
        $stage = Stage::find($stageId);


        $stage->id_Hopital = $hopitalId;
        $stage->id_Service = $serviceId;
        $stage->id_Enseignant = $enseignantId;
        $stage->date_debut = $startDate;
        $stage->date_fin = $endDate;

        return $stage->save();
    }
}