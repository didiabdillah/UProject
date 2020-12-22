<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('history_id');
            $table->unsignedBigInteger('history_user_id');
            $table->string('history_project_id', 255);
            $table->string('history_subject', 255);
            $table->string('history_verb', 255);
            $table->text('history_object');
            $table->string('history_icon', 50);
            $table->string('history_background', 50);

            $table->timestamps();

            $table->foreign('history_user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('history_project_id')->references('project_id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('histories', function (Blueprint $table) {
            $table->dropForeign('histories_history_user_id_foreign');
            $table->dropForeign('histories_history_project_id_foreign');
        });
        Schema::dropIfExists('histories');
    }
}
