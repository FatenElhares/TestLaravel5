<?php

namespace App\Metier;

use App\Models\Grade;

class GradeRepository extends ResourceRepository
{


    public function __construct(Grade $grade)
    {
        $this->model = $grade;
    }

    public function isExistGrade($gradeId)
    {
        return Grade::where("id_Grade", "=", $gradeId)
            ->first();
    }
}
