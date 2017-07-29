<?php


namespace App\Http\Controllers;


use App\Metier\EnseignantRepository;
use App\Metier\HopitalRepository;
use App\Metier\ServiceRepository;
use App\Metier\StageRepository;
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

    public function getAllEtudiant()
    {
        $etudiants = $this->etudiantRepository->getAll();

        return response()->json(["data" => $etudiants], 200);
    }

    public function addEtudiant(Request $request)
    {
        if (!$request->has([

            "niveauId",
            "competencesId",
            "nom",
            "prenom",
            "CIN",
            "carte_Etudiant",
            "email",
            "active",
            "confirmation_code",
            "qr_code"

        ])
        ) {
            return response()->json(["error" => "Bad Request"], 400);
        }

        $niveauId = $request->input("niveauId");
        $competencesId = $request->input("competencesId");
        $nom = $request->input("nom");
        $prenom = $request->input("prenom");
        $CIN = $request->input("CIN");
          $carte_Etudiant = $request->input("carte_Etudiant");
          $email = $request->input("email");
          $active= $request->input("active");
          $confirmation_code = $request->input("confirmation_code");
          $qr_code = $request->input("qr_code");
        if (!$this->niveauRepository->isExistNiveau($niveauId)) {
            return response()->json(["error" => "niveau not found"], 404);
        }
        if (!$this->competencesRepository->isExistCompetences($competencesId)) {
            return response()->json(["error" => "competences not found"], 404);
        }





        if ($this->etudiantRepository->addEtudiant($niveauId,$competencesId,$nom,$prenom,$CIN,$carte_Etudiant,$email,$active,$confirmation_code,$qr_code)) {
            return response()->json(["message" => "add etudiant success"], 200);
        } else {
            return response()->json(["error" => "cannot add etudiant"], 500);
        }
    }


    public function updateEtudiant($etudianteId, Request $request)
    {
        if (!$request->has([
          "niveauId",
          "competencesId",
          "nom",
          "prenom",
          "CIN",
          "carte_Etudiant",
          "email",
          "active",
          "confirmation_code",
          "qr_code"

      ])
      ) {
          return response()->json(["error" => "Bad Request"], 400);
      }

      $niveauId = $request->input("niveauId");
      $competencesId = $request->input("competencesId");
      $nom = $request->input("nom");
      $prenom = $request->input("prenom");
      $CIN = $request->input("CIN");
        $carte_Etudiant = $request->input("carte_Etudiant");
        $email = $request->input("email");
        $active= $request->input("active");
        $confirmation_code = $request->input("confirmation_code");
        $qr_code = $request->input("qr_code");
      if (!$this->niveauRepository->isExistNiveau($niveauId)) {
          return response()->json(["error" => "niveau not found"], 404);
      }
      if (!$this->competencesRepository->isExistCompetences($competencesId)) {
          return response()->json(["error" => "competences not found"], 404);
      }

        if ($this->etudiantRepository->updateEtudiant($etudiantId, $niveauId ,$competencesId ,$nom ,$prenom ,$CIN ,$carte_Etudiant ,$email ,$active,$confirmation_code,$qr_code )) {
            return response()->json(["message" => "etudiant edited success"], 200);
        } else {
            return response()->json(["error" => "cannot edit etudiant"], 500);
        }

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
