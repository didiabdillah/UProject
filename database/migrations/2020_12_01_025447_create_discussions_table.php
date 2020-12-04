<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->bigIncrements('discussion_id');
            $table->unsignedBigInteger('discussion_user_id');
            $table->unsignedBigInteger('discussion_project_id');
            $table->text('discussion_message');
            $table->string('discussion_file', 255);

            $table->timestamps();

            $table->foreign('discussion_user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('discussion_project_id')->references('project_id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discussions', function (Blueprint $table) {
            $table->dropForeign('discussions_discussion_user_id_foreign');
            $table->dropForeign('discussions_discussion_project_id_foreign');
        });
        Schema::dropIfExists('discussions');
    }
}
