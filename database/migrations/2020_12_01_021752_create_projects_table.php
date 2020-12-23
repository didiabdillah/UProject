<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('project_id', 255)->primary()->unique();
            $table->string('project_user_id', 255);
            $table->string('project_uuid', 64)->unique()->nullable();
            $table->string('project_title', 150);
            $table->text('project_description');
            $table->string('project_image', 255)->nullable();
            $table->enum('project_status', ['active', 'deactive']);
            $table->boolean('project_finish');
            $table->dateTime('project_deadline');

            $table->timestamps();

            $table->foreign('project_user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_project_user_id_foreign');
        });
        Schema::dropIfExists('projects');
    }
}
