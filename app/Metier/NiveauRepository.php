<?php

namespace App\Metier;
use App\Models\Niveau;

class NiveauRepository extends ResourceRepository
{


    public function __construct(Niveau $niveau)
    {
        $this->model = $niveau;
    }

    public function isExistNiveau($niveauId)
    {
        return Niveau::where("id_Niveau", "=", $niveauId)
            ->first();
    }
}
