<?php

/**
 * Created by IntelliJ IDEA.
 * User: Abbes
 * Date: 29/07/2017
 * Time: 12:03
 */

namespace App\Metier;


use App\Models\Enseignant;
use App\Models\Hopital;

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
