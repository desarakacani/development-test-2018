<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tittle', 30);
            $table->string('description',250);
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')
                ->references('id')->on('users');
            $table->integer('task_status_id')->unsigned()->nullable();
            $table->foreign('task_status_id')
                ->references('id')->on('task_statuses');
            $table->integer('priority_id')->unsigned()->nullable();
            $table->foreign('priority_id')
                ->references('id')->on('task_priorities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
