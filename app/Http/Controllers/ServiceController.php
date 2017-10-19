<?php

namespace App\Http\Controllers;

use App\Metier\HopitalRepository;
use App\Metier\ServiceRepository;
use Illuminate\Http\Request;


class ServiceController extends Controller
{


    protected $serviceRepository;
    protected $hopitalRepository;


    public function __construct(ServiceRepository $serviceRepository,
                                HopitalRepository $hopitalRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->hopitalRepository = $hopitalRepository;
    }

    public function getAllService()
    {
        $service = $this->serviceRepository->getAll();

        return response()->json(["data" => $service], 200);
    }

    public function addService(Request $request)
    {
        if (!$request->has([

            "hopitalId",
          "nomservice"
        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }

        $hopitalId = $request->input("hopitalId");

        $nomservice = $request->input("nomservice");

        if (!$this->hopitalRepository->isExistHopital($hopitalId)) {
            return response()->json(["error" => "enseigant not found"], 404);
        }

        if ($this->serviceRepository->addService($hopitalId,$nomservice)) {
            return response()->json(["message" => "add service success"], 200);
        } else {
            return response()->json(["error" => "cannot add service"], 500);
        }
    }


    public function updateService($serviceId, Request $request)
    {
        if (!$request->has([
          "hopitalId",
        "nomservice",

        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }
        $hopitalId = $request->input("hopitalId");
        $nomservice = $request->input("nomservice");


        if (!$this->hopitalRepository->isExistHopital($hopitalId)) {
            return response()->json(["error" => "enseigant not found"], 404);
        }

        if ($this->serviceRepository->updateService($serviceId, $nomservice)) {
            return response()->json(["message" => "service edited success"], 200);
        } else {
            return response()->json(["error" => "cannot edit service"], 500);
        }

    }

    public function getServiceById($serviceId)
    {
        if ($service = $this->serviceRepository->getById($serviceId)) {
            return response()->json(["data" => $service], 200);
        } else {
            return response()->json(["error" => "service not found"], 404);
        }
    }

    public function deleteService($serviceId)
    {

        if (!$this->serviceRepository->isExistStage($serviceId)) {
            return response()->json(["error" => "service not found"], 404);
        }

        if ($this->serviceRepository->deleteService($serviceId)) {
            return response()->json(["message" => "service deleted success"], 200);
        } else {
            return response()->json(["error" => "cannot delete service"], 500);
        }
    }
}
