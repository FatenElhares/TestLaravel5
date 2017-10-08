<?php

namespace App\Metier;

use App\Models\Specialite;

class SpecialiteRepository extends ResourceRepository
{


    public function __construct(Specialite $specialite)
    {
        $this->model = $specialite;
    }

    public function isExistSpecialite($specialiteId)
    {
        return Specialite::where("id_Specialite", "=", $specialiteId)
            ->first();
    }
}
