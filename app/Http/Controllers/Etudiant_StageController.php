<?php

namespace App\Http\Controllers;

use App\Metier\EtudiantRepository;
use App\Metier\Etudiant_StageRepository;
use App\Metier\StageRepository;
use Illuminate\Http\Request;


class Etudiant_StageController extends Controller
{

    protected $etudiant_stageRepository;
    protected $stageRepository;
    protected $etudiantRepository;


    public function __construct(Etudiant_StageRepository $etudiant_stageRepository,
                                StageRepository $stageRepository,
                                EtudiantRepository $etudiantRepository)
    {
        $this->etudiant_stageRepository = $etudiant_stageRepository;
        $this->stageRepository = $stageRepository;
        $this->etudiantRepository = $etudiantRepository;

    }

    public function getAllEtudiant_Stage()
    {
        $stages = $this->etudiant_stageRepository->getAll();

        return response()->json(["data" => $stages], 200);
    }

    public function addEtudiant_Stage(Request $request)
    {
        if (!$request->has([
            "stageId",
            "etudiantId",
            "note"
        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }

        $stageId = $request->input("stageId");
        $etudiantId = $request->input("etudiantId");
        $note = $request->input("note");

        if (!$this->stageRepository->isExistHopital($stageId)) {
            return response()->json(["error" => "stage not found"], 404);
        }
        if (!$this->etudiantRepository->isExistService($etudiantId)) {
            return response()->json(["error" => "etudiant not found"], 404);
        }

        if ($this->etudiant_stageRepository->addEtudiant_Stage($stageId, $etudiantId, $note)) {
            return response()->json(["message" => "add etudiant_stage success"], 200);
        } else {
            return response()->json(["error" => "cannot add etudiant_stage"], 500);
        }
    }


    public function updateEtudiant_Stage($etudiant_stageId, Request $request)
    {
        if (!$request->has([
          "stageId",
          "etudiantId",
          "note"
        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }
        $stageId = $request->input("stageId");
        $etudiantId = $request->input("etudiantId");
        $note = $request->input("note");

        if (!$this->stageRepository->isExistHopital($stageId)) {
            return response()->json(["error" => "stage not found"], 404);
        }
        if (!$this->etudiantRepository->isExistService($etudiantId)) {
            return response()->json(["error" => "etudiant not found"], 404);
        }
        if (!$this->etudiant_stageRepository->isExistStage($etudiant_stageId)) {
            return response()->json(["error" => "etudiant_stage not found"], 404);
        }

        if ($this->etudiant_stageRepository->updateEtudiant_Stage($etudiant_stageId, $stageId, $etudiantId, $note)) {
            return response()->json(["message" => "etudiant_stage edited success"], 200);
        } else {
            return response()->json(["error" => "cannot edit etudiant_stage"], 500);
        }

    }

    public function getEtudiant_StageById($etudiant_stageId)
    {
        if ($etudiant_stage = $this->etudiant_stageRepository->getById($etudiant_stageId)) {
            return response()->json(["data" => $etudiant_stage], 200);
        } else {
            return response()->json(["error" => "etudiant_stage not found"], 404);
        }
    }

    public function deleteEtudiant_Stage($etudiant_stageId)
    {

        if (!$this->etudiant_stageRepository->isExistEtudiant_Stage($etudiant_stageId)) {
            return response()->json(["error" => "etudiant_stage not found"], 404);
        }

        if ($this->etudiant_stageRepository->deleteEtudiant_Stage($etudiant_stageId)) {
            return response()->json(["message" => "etudiant_stage deleted success"], 200);
        } else {
            return response()->json(["error" => "cannot delete etudiant_stage"], 500);
        }
    }
}
