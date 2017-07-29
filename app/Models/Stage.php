<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'Stage';
    protected $primaryKey = 'id_Stage';


    protected $fillable = ['date_debut', 'date_fin', 'id_Enseignant', 'id_Hopital', 'id_Service'];

    public $timestamps = false;


    public static function AddStage($id_Hopital, $id_Service, $id_Etudiant, $id_Enseignant, $note, $Datedebut, $Datefin)
    {
#
        $newObj = new Stage;
        $newObj->id_Hopital = $id_Hopital;
        $newObj->id_Service = $id_Service;
        $newObj->id_Etudiant = $id_Etudiant;
        $newObj->id_Enseignant = $id_Enseignant;
        $newObj->note = $note;
        $newObj->Datedebut = $Datedebut;
        $newObj->Datefin = $Datefin;

        $newObj->save();

    }


#  public static function DonnerNote($id, $note)  {  $Obj = new Stage;  $Obj = getStageById($id);  $Obj->note=$note;$newObj->save();}

    public function Donnernote($id, $note)
    {
        #  $stage = Stage::find($id);
        #  $stage->where('note', $note)->update(array('image' => 'asdasd'));

        $stage = Stage::find($id);

        if ($stage) {
            $stage->note = $note;
            $stage->save();
        }
        return stage;
    }


    public static function getStageById($id)
    {
        return DB::table('Stage')
            ->select('Stage.*')
            ->where('id_Stage', $id)
            ->first();
    }


    public static function ListeStage($id)
    {
        return DB::table('Stage')
            ->select('Stage.*')
            ->get();
    }


    public static function destroy($id)
    {

        #$report = $delete;

        $rsltDelRec = Stage::find($id);
        $rsltDelRec->delete();
        $request->session()->flash('alert-success', ' Stage is deleted successfully.');

        # return redirect()->route('admin.flags');
    }

}
