<?php



namespace App\Metier;


use App\Models\Enseignant;
use App\Models\Hopital;

class EnseignantRepository extends ResourceRepository
{


    public function __construct(Enseignant $enseignant)
    {
        $this->model = $enseignant;
    }

    public function isExistEnseignant($enseignantId)
    {
        return Enseignant::where("id_Enseignant", "=", $enseignantId)
            ->first();
    }
}
