<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('task_id');
            $table->unsignedBigInteger('task_user_id');
            $table->string('task_project_id', 255);
            $table->string('task_title', 150);
            $table->dateTime('task_deadline');
            $table->enum('task_status', ['active', 'deactive']);
            $table->boolean('task_finish');

            $table->timestamps();

            $table->foreign('task_user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('task_project_id')->references('project_id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_task_user_id_foreign');
            $table->dropForeign('tasks_task_project_id_foreign');
        });
        Schema::dropIfExists('tasks');
    }
}
