<?php


namespace App\Http\Controllers;


use App\Metier\EnseignantRepository;
use App\Metier\GradeRepository;
use App\Metier\SpecialiteRepository;
use Illuminate\Http\Request;


class EnseignantController extends Controller
{




    protected $enseignantRepository;
    protected $gradeRepository;
    protected $specialiteRepository;

    public function __construct(EnseignantRepository $enseignantRepository,
                                GradeRepository $gradeRepository,
                                SpecialiteRepository $specialiteRepository)
    {
        $this->enseignantRepository = $enseignantRepository;
        $this->gradeRepository = $gradeRepository;
        $this->specialiteRepository = $specialiteRepository;
    }


    public function getAllEnseignant()
    {
        $enseignants = $this->enseignantRepository->getAll();

        return response()->json(["data" => $enseignants], 200);
    }


    public function getEnseignantById($enseignantId)
    {
        if ($enseignant = $this->enseignantRepository->getById($enseignantId)) {
            return response()->json(["data" => $enseignant], 200);
        } else {
            return response()->json(["error" => "enseignant not found"], 404);
        }
    }

    public function deleteEnseignant($enseignantId)
    {

        if (!$this->enseignantRepository->isExistEnseignant($enseignantId)) {
            return response()->json(["error" => "enseignant not found"], 404);
        }

        if ($this->enseignantRepository->deleteEnseignant($enseignantId)) {
            return response()->json(["message" => "enseignant deleted success"], 200);
        } else {
            return response()->json(["error" => "cannot delete enseignant"], 500);
        }
    }
}
