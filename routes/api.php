<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'stage'], function () {




    Route::get("/", "StageController@getAllStage");

    Route::get("/{enseignantId}", "StageController@getAllStage_Enseignant");

    Route::get("/{stageId}", "StageController@getStageById");
    Route::post("/add", "StageController@addStage");
    Route::put("/{stageId}", "StageController@updateStage");
    Route::delete("/{stageId}", "StageController@deleteStage");

});

Route::group(['prefix' => 'etudiant'], function () {

    Route::get("/", "EtudiantController@getAllEtudiant");
    Route::get("/{etudiantId}", "EtudiantController@getEtudiantById");
    Route::post("/add", "EtudiantController@addEtudiant");
    Route::put("/{etudiantId}", "EtudiantController@updateEtudiant");
    Route::delete("/{etudiantId}", "EtudiantController@deleteEtudiant");

});


Route::group(['prefix' => 'competences'], function () {

    Route::get("/", "CompetencesController@getAllCompetences");
    Route::get("/{competencesId}", "CompetencesController@getCompetencesById");
    Route::post("/add", "CompetencesController@addCompetences");
    Route::put("/{competencesId}", "CompetencesController@updateCompetences");
    Route::delete("/{competencesId}", "CompetencesController@deleteCompetences");

});


Route::group(['prefix' => 'etudiant_stage'], function () {
    Route::get("/", "Etudiant_StageController@getAllEtudiant_Stage");

    Route::get("/terminated", "Etudiant_StageController@getAllEtudiant_StageTerminated");
    Route::get("/{etudiant_stageId}", "Etudiant_StageController@getEtudiant_StageById");
    Route::get("/{stageId}", "Etudiant_StageController@getAllEtudiant");
      Route::get("/{etudiantId}", "Etudiant_StageController@getAllStages");
    Route::post("/add", "Etudiant_StageController@addEtudiant_Stage");
    Route::put("/{etudiant_stageId}", "Etudiant_StageController@updateEtudiant_Stage");
    Route::delete("/{etudiant_stageId}", "Etudiant_StageController@deleteEtudiant_Stage");


Route::get('/{stageId}/{etudiantId}/{otheretudiantIds?}', 'Etudiant_StageController@AffecterListeEtudiant')->where('otheretudiantIds', '(.*)');


});
