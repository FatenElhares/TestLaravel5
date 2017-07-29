<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationEtudiantStage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Etudiant_Stage', function (Blueprint $table) {
            $table->increments('id_Etudiant_Stage');

            $table->string('note',100);
            $table->integer('id_Stage')->unsigned();
            $table->foreign('id_Stage')->references('id_Stage')->on('Stage');


            $table->integer('id_Etudiant')->unsigned();
            $table->foreign('id_Etudiant')->references('id_Etudiant')->on('Etudiant');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Etudiant_Stage', function (Blueprint $table) {

            $table->dropForeign('Etudiant_Stage_id_Stage_foreign');
            $table->dropForeign('Etudiant_Stage_id_Etudiant_foreign');

        });
        Schema::drop('Etudiant_Stage');
    }
}
