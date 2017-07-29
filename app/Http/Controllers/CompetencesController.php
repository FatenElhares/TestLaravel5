<?php

namespace App\Http\Controllers;

use App\Metier\EnseignantRepository;
use App\Metier\CompetencesRepository;
use Illuminate\Http\Request;


class CompetencesController extends Controller
{


    protected $competencesRepository;
    protected $enseignantRepository;


    public function __construct(CompetencesRepository $competencesRepository,
                                EnseignantRepository $enseignantRepository)
    {
        $this->competencesRepository = $competencesRepository;
        $this->enseignantRepository = $enseignantRepository;
    }

    public function getAllCompetences()
    {
        $competences = $this->competencesRepository->getAll();

        return response()->json(["data" => $competences], 200);
    }

    public function addCompetences(Request $request)
    {
        if (!$request->has([

            "enseignantId",
          "ethique",
          "gestionnaire",
          "organisation",
          "collaboration",
          "professionnalisme"
        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }

        $enseignantId = $request->input("enseignantId");
        $startDate = $request->input("enseignantId");
        $endDate = $request->input("ethique");
        $startDate = $request->input("gestionnaire");
        $endDate = $request->input("organisation");
        $startDate = $request->input("collaboration");
        $endDate = $request->input("professionnalisme");


        if (!$this->enseignantRepository->isExistEnseignant($enseignantId)) {
            return response()->json(["error" => "enseigant not found"], 404);
        }

        if ($this->competencesRepository->addCompetences($enseignantId,$ethique, $gestionnaire, $organisation, $collaboration, $professionnalisme)) {
            return response()->json(["message" => "add competences success"], 200);
        } else {
            return response()->json(["error" => "cannot add competences"], 500);
        }
    }


    public function updateCompetences($competencesId, Request $request)
    {
        if (!$request->has([
          "enseignantId",
        "ethique",
        "gestionnaire",
        "organisation",
        "collaboration",
        "professionnalisme"
        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }
        $enseignantId = $request->input("enseignantId");
        $startDate = $request->input("enseignantId");
        $endDate = $request->input("ethique");
        $startDate = $request->input("gestionnaire");
        $endDate = $request->input("organisation");
        $startDate = $request->input("collaboration");
        $endDate = $request->input("professionnalisme");


        if (!$this->enseignantRepository->isExistEnseignant($enseignantId)) {
            return response()->json(["error" => "enseigant not found"], 404);
        }

        if ($this->competencesRepository->updateCompetences($competencesId, $enseignantId,$ethique, $gestionnaire, $organisation, $collaboration, $professionnalisme)) {
            return response()->json(["message" => "competences edited success"], 200);
        } else {
            return response()->json(["error" => "cannot edit competences"], 500);
        }

    }

    public function getCompetencesById($competencesId)
    {
        if ($competences = $this->competencesRepository->getById($competencesId)) {
            return response()->json(["data" => $competences], 200);
        } else {
            return response()->json(["error" => "competences not found"], 404);
        }
    }

    public function deleteCompetences($competencesId)
    {

        if (!$this->competencesRepository->isExistStage($competencesId)) {
            return response()->json(["error" => "competences not found"], 404);
        }

        if ($this->competencesRepository->deleteCompetences($competencesId)) {
            return response()->json(["message" => "competences deleted success"], 200);
        } else {
            return response()->json(["error" => "cannot delete competences"], 500);
        }
    }
}
