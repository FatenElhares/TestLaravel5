<?php

namespace App\Http\Controllers;

use App\Metier\EnseignantRepository;
use App\Metier\HopitalRepository;
use App\Metier\ServiceRepository;
use App\Metier\StageRepository;
use Illuminate\Http\Request;


class StageController extends Controller
{


    protected $stageRepository;
    protected $hopitalRepository;
    protected $serviceRepository;
    protected $enseignantRepository;


    public function __construct(StageRepository $stageRepository,
                                HopitalRepository $hopitalRepository,
                                ServiceRepository $serviceRepository,
                                EnseignantRepository $enseignantRepository)
    {
        $this->stageRepository = $stageRepository;
        $this->hopitalRepository = $hopitalRepository;
        $this->serviceRepository = $serviceRepository;
        $this->enseignantRepository = $enseignantRepository;
    }

    public function getAllStage()
    {
        $stages = $this->stageRepository->getAll();

        return response()->json(["data" => $stages], 200);
    }

    public function addStage(Request $request)
    {
        if (!$request->has([
            "hopitalId",
            "serviceId",
            "enseignantId",
            "startDate",
            "endDate"
        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }

        $hopitalId = $request->input("hopitalId");
        $serviceId = $request->input("serviceId");
        $enseignantId = $request->input("enseignantId");
        $startDate = $request->input("startDate");
        $endDate = $request->input("endDate");
        if (!$this->hopitalRepository->isExistHopital($hopitalId)) {
            return response()->json(["error" => "hospital not found"], 404);
        }
        if (!$this->serviceRepository->isExistService($serviceId)) {
            return response()->json(["error" => "service not found"], 404);
        }
        if (!$this->enseignantRepository->isExistEnseignant($enseignantId)) {
            return response()->json(["error" => "enseigant not found"], 404);
        }

        if ($this->stageRepository->addStage($hopitalId, $serviceId, $enseignantId, $startDate, $endDate)) {
            return response()->json(["message" => "add stage success"], 200);
        } else {
            return response()->json(["error" => "cannot add stage"], 500);
        }
    }


    public function updateStage($stageId, Request $request)
    {
        if (!$request->has([
            "hopitalId",
            "serviceId",
            "enseignantId",
            "startDate",
            "endDate"
        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }
        $hopitalId = $request->input("hopitalId");
        $serviceId = $request->input("serviceId");
        $enseignantId = $request->input("enseignantId");
        $startDate = $request->input("startDate");
        $endDate = $request->input("endDate");
        if (!$this->hopitalRepository->isExistHopital($hopitalId)) {
            return response()->json(["error" => "hospital not found"], 404);
        }
        if (!$this->serviceRepository->isExistService($serviceId)) {
            return response()->json(["error" => "service not found"], 404);
        }
        if (!$this->enseignantRepository->isExistEnseignant($enseignantId)) {
            return response()->json(["error" => "enseigant not found"], 404);
        }

        if (!$this->stageRepository->isExistStage($stageId)) {
            return response()->json(["error" => "stage not found"], 404);
        }

        if ($this->stageRepository->updateStage($stageId, $hopitalId, $serviceId, $enseignantId, $startDate, $endDate)) {
            return response()->json(["message" => "stage edited success"], 200);
        } else {
            return response()->json(["error" => "cannot edit stage"], 500);
        }

    }

    public function getStageById($stageId)
    {
        if ($stage = $this->stageRepository->getById($stageId)) {
            return response()->json(["data" => $stage], 200);
        } else {
            return response()->json(["error" => "stage not found"], 404);
        }
    }

    public function deleteStage($stageId)
    {

        if (!$this->stageRepository->isExistStage($stageId)) {
            return response()->json(["error" => "stage not found"], 404);
        }

        if ($this->stageRepository->deleteStage($stageId)) {
            return response()->json(["message" => "stage deleted success"], 200);
        } else {
            return response()->json(["error" => "cannot delete stage"], 500);
        }
    }
}
