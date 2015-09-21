<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectsCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('prego_project_collaborator', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('collaborator_id')->unsigned();
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')->on('prego_projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('collaborator_id')
                ->references('id')->on('prego_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema:dropIfExists('prego_project_collaborator');
    }
}
