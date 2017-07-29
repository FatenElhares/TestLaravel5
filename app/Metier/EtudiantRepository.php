<?php

/**
 * Created by IntelliJ IDEA.
 * User: Abbes
 * Date: 29/07/2017
 * Time: 12:03
 */

namespace App\Metier;


use App\Models\Etudiant;
use App\Models\Hopital;

class EtudiantRepository extends ResourceRepository
{


    public function __construct(Etudiant $etudiant)
    {
        $this->model = $etudiant;
    }

    public function isExistEtudiant($etudiantId)
    {
        return Etudiant::where("id_Etudiant", "=", $etudiantId)
            ->first();
    }
}
