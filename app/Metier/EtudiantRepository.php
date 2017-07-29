<?php


namespace App\Metier;

use App\Models\Etudiant;

class EtudiantRepository extends ResourceRepository
{

    public function __construct(Etudiant $session)
    {
        $this->model = $session;
    }

    public function addEtudiant($niveauId,$competencesId,$nom,$prenom,$CIN,$carte_Etudiant,$email,$active,$confirmation_code,$qr_code)
    {
        $etudiant = new Etudiant();

        $etudiant->niveauId = $niveauId;
        $etudiant->competencesId = $competencesId;
        $etudiant->nom = $nom;
        $etudiant->prenom = $prenom;
        $etudiant->CIN = $CIN;
        $etudiant->carte_Etudiant = $carte_Etudiant;
        $etudiant->email = $email;
        $etudiant->active = $active;
        $etudiant->confirmation_code = $confirmation_code;
        $etudiant->qr_code = $qr_code;

        return $etudiant->save();
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

    public function updateEtudiant($etudiantId, $niveauId,$competencesId,$nom,$prenom,$CIN,$carte_Etudiant,$email,$active,$confirmation_code,$qr_code)
    {
        $etudiant = Etudiant::find($etudiantId);

        $etudiant->niveauId = $niveauId;
        $etudiant->competencesId = $competencesId;
        $etudiant->nom = $nom;
        $etudiant->prenom = $prenom;
        $etudiant->CIN = $CIN;
        $etudiant->carte_Etudiant = $carte_Etudiant;
        $etudiant->email = $email;
        $etudiant->active = $active;
        $etudiant->confirmation_code = $confirmation_code;
        $etudiant->qr_code = $qr_code;

        return $etudiant->save();
    }
}
