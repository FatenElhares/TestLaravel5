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
    Route::get("/", "Etudiant_StageIdController@getAllEtudiant_Stage");
    Route::get("/{etudiant_stageId}", "Etudiant_StageIdController@getEtudiant_StageById");
    Route::post("/add", "Etudiant_StageIdController@addEtudiant_Stage");
    Route::put("/{etudiant_stageId}", "Etudiant_StageIdController@updateEtudiant_Stage");
    Route::delete("/{etudiant_stageId}", "Etudiant_StageIdController@deleteEtudiant_Stage");

});
