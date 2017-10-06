<?php


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
