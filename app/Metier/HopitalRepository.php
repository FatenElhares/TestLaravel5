<?php

/**
 * Created by IntelliJ IDEA.
 * User: Abbes
 * Date: 29/07/2017
 * Time: 12:03
 */

namespace App\Metier;


use App\Models\Hopital;

class HopitalRepository extends ResourceRepository
{


    public function __construct(Hopital $hopital)
    {
        $this->model = $hopital;
    }

    public function isExistHopital($hopitalId)
    {
        return Hopital::where("id_Hopital", "=", $hopitalId)
            ->first();
    }
}