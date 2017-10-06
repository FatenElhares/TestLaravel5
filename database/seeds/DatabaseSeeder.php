<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          for ($i=1; $i < 4; $i++) {
    	    	DB::table('Niveau')->insert([
    	            'nom' => $i,
    	        ]);
        	}


          for ($i=1; $i < 4; $i++) {
            DB::table('Hopital')->insert([
                  'nom' => $i,
                  'ville' => $i,
              ]);
          }

          for ($i=1; $i < 4; $i++) {
            DB::table('Grade')->insert([
                  'nom' => $i,
              ]);
          }

          for ($i=1; $i < 4; $i++) {
            DB::table('Specialite')->insert([
                  'nom' => $i,
              ]);
          }


          for ($i=1; $i < 4; $i++) {
            DB::table('Enseignant')->insert([
              'CIN' => $i,
                  'nom' => $i,
                  'prenom' => $i,
                  'passwordDecrypt' => $i,
                  'qr_code' => $i,
                  'id_Grade' => $i,
                  'id_Specialite' => $i,
                  'login' => $i,
                  'password' => $i,
              ]);
          }

          for ($i=1; $i < 4; $i++) {
            DB::table('Privilege')->insert([
                  'nom' => $i,
              ]);
          }




          for ($i=1; $i < 4; $i++) {
            DB::table('Enseignant_Privilege')->insert([
              'id_Enseignant' => $i,
                  'id_Privilege' => $i,
              ]);
          }



          for ($i=1; $i < 4; $i++) {
            DB::table('Competences')->insert([
              'ethique' => $i,
                  'gestionnaire' => $i,
                  'organisation' => $i,
                  'collaboration' => $i,
                  'professionnalisme' => $i,
                  'id_Enseignant' => $i,
              ]);
          }



          for ($i=1; $i < 4; $i++) {
            DB::table('Etudiant')->insert([
                  'nom' => $i,
                  'prenom' => $i,
                    'CIN' => $i,
                  'carte_Etudiant' => $i,
                  'email' => $i,
                  'active' => $i,
                  'confirmation_code' => $i,
                  'qr_code' => $i,
                  'id_Niveau' => $i,
                  'id_Competences' => $i,
              ]);
          }




                    for ($i=1; $i < 4; $i++) {
                      DB::table('Service')->insert([
                            'nomservice' => $i,
                            'id_Hopital' => $i,
                        ]);
                    }


                    for ($i=1; $i < 4; $i++) {
                      DB::table('Stage')->insert([
                            'date_debut' => $i,
                            'date_fin' => $i,
                              'id_Hopital' => $i,
                            'id_Service' => $i,
                            'id_Enseignant' => $i,

                        ]);
                    }




                    for ($i=1; $i < 4; $i++) {
                      DB::table('Etudiant_Stage')->insert([
                            'note' => $i,
                            'motif' => $i,
                              'id_Stage' => $i,
                            'id_Etudiant' => $i,

                        ]);
                    }



    }
}
