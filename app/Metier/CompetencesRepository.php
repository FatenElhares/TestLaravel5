<?php

/**
 * Created by IntelliJ IDEA.
 * User: Abbes
 * Date: 29/07/2017
 * Time: 12:03
 */

namespace App\Metier;


use App\Models\Competences;
use App\Models\Hopital;

class CompetencesRepository extends ResourceRepository
{


    public function __construct(Competences $competences)
    {
        $this->model = $competences;
    }

    public function isExistCompetences($competencesId)
    {
        return Competences::where("id_Competences", "=", $competencesId)
            ->first();
    }
}
