<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationCompetences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Competences', function (Blueprint $table) {
            $table->increments('id_Competences');
            $table->integer('ethique');
            $table->integer('gestionnaire');
            $table->integer('organisation');
            $table->integer('collaboration');
            $table->integer('professionnalisme');


           $table->integer('id_Enseignant')->unsigned();
           $table->foreign('id_Enseignant')->references('id_Enseignant')->on('Enseignant');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Competences', function (Blueprint $table) {
            $table->dropForeign('Competences_id_Enseignant_foreign');
        });
        Schema::drop('Competences');
    }
}
