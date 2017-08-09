<?php


namespace App\Metier;

use App\Models\Etudiant;

class EtudiantRepository extends ResourceRepository
{

    public function __construct(Etudiant $session)
    {
        $this->model = $session;
    }


    public function isExistEtudiant($etudiantId)
    {
        return Etudiant::where("id_Etudiant", "=", $etudiantId)
            ->first();
    }

    public function deleteEtudiant($etudiantId)
    {
        return Etudiant::where("id_Etudiant", "=", $etudiantId)
            ->delete();
    }

  
}
