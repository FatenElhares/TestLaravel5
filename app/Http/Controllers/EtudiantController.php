<?php


namespace App\Http\Controllers;


use App\Metier\EtudiantRepository;
use App\Metier\NiveauRepository;
use App\Metier\CompetencesRepository;
use Illuminate\Http\Request;


class EtudiantController extends Controller
{


    protected $etudiantRepository;
    protected $niveauRepository;
    protected $competencesRepository;

    public function __construct(EtudiantRepository $etudiantRepository,
                                NiveauRepository $niveauRepository,
                                CompetencesRepository $competencesRepository)
    {
        $this->etudiantRepository = $etudiantRepository;
        $this->niveauRepository = $niveauRepository;
        $this->competencesRepository = $competencesRepository;
    }





    public function getEtudiantById($etudiantId)
    {
        if ($etudiant = $this->etudiantRepository->getById($etudiantId)) {
            return response()->json(["data" => $etudiant], 200);
        } else {
            return response()->json(["error" => "etudiant not found"], 404);
        }
    }

    public function deleteEtudiant($etudiantId)
    {

        if (!$this->etudiantRepository->isExistEtudiant($etudiantId)) {
            return response()->json(["error" => "etudiant not found"], 404);
        }

        if ($this->etudiantRepository->deleteEtudiant($etudiantId)) {
            return response()->json(["message" => "etudiant deleted success"], 200);
        } else {
            return response()->json(["error" => "cannot delete etudiant"], 500);
        }
    }
}
