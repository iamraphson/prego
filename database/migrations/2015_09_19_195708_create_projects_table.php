<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('prego_projects', function(Blueprint $table){
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('project_name');
            $table->longText('project_notes');
            $table->string('project_status')->default('upcoming');
            $table->integer('user_id')->unsigned()->default(0);
            $table->date('due_date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('prego_users')->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('prego_projects');
    }
}
