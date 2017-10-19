<?php

namespace App\Http\Controllers;


use App\Metier\HopitalRepository;
use Illuminate\Http\Request;


class HopitalController extends Controller
{


    protected $hopitalRepository;



    public function __construct(HopitalRepository $hopitalRepository)
    {
        $this->hopitalRepository = $hopitalRepository;

    }

    public function getAllHopital()
    {
        $hopital = $this->hopitalRepository->getAll();

        return response()->json(["data" => $hopital], 200);
    }

    public function addHopital(Request $request)
    {
        if (!$request->has([

            "enseignantId",
          "nom",
          "ville",

        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }

        $enseignantId = $request->input("enseignantId");
        $nom = $request->input("nom");
        $ville = $request->input("ville");


        if (!$this->enseignantRepository->isExistEnseignant($enseignantId)) {
            return response()->json(["error" => "enseigant not found"], 404);
        }

        if ($this->hopitalRepository->addHopital($enseignantId,$nom, $ville)) {
            return response()->json(["message" => "add hopital success"], 200);
        } else {
            return response()->json(["error" => "cannot add hopital"], 500);
        }
    }


    public function updateHopital($hopitalId, Request $request)
    {
        if (!$request->has([
          "enseignantId",
        "nom",
        "ville",

        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }
        $enseignantId = $request->input("enseignantId");
        $nom = $request->input("nom");
        $ville = $request->input("ville");


        if (!$this->enseignantRepository->isExistEnseignant($enseignantId)) {
            return response()->json(["error" => "enseigant not found"], 404);
        }

        if ($this->hopitalRepository->updateHopital($hopitalId, $nom,$ville)) {
            return response()->json(["message" => "hopital edited success"], 200);
        } else {
            return response()->json(["error" => "cannot edit hopital"], 500);
        }

    }

    public function getHopitalById($hopitalId)
    {
        if ($hopital = $this->hopitalRepository->getById($hopitalId)) {
            return response()->json(["data" => $hopital], 200);
        } else {
            return response()->json(["error" => "hopital not found"], 404);
        }
    }

    public function deleteHopital($hopitalId)
    {

        if (!$this->hopitalRepository->isExistStage($hopitalId)) {
            return response()->json(["error" => "hopital not found"], 404);
        }

        if ($this->hopitalRepository->deleteHopital($hopitalId)) {
            return response()->json(["message" => "hopital deleted success"], 200);
        } else {
            return response()->json(["error" => "cannot delete hopital"], 500);
        }
    }
}
