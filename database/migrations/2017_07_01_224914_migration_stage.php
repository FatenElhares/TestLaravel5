<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationStage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Stage', function (Blueprint $table) {
            $table->increments('id_Stage');

            $table->date('date_debut');
            $table->date('date_fin');


            $table->integer('id_Hopital')->unsigned();
            $table->foreign('id_Hopital')->references('id_Hopital')->on('Hopital');


            $table->integer('id_Service')->unsigned();
            $table->foreign('id_Service')->references('id_Service')->on('Service');

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
        Schema::table('Stage', function (Blueprint $table) {

            $table->dropForeign('Stage_id_Hopital_foreign');
            $table->dropForeign('Stage_id_Service_foreign');
            $table->dropForeign('Stage_id_Enseignant_foreign');
        });
        Schema::drop('Stage');
    }
}
