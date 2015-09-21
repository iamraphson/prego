<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('prego_todo', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->string('todo_name');
            $table->longText('todo_description');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('prego_todo');
    }
}