<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('member_id');
            $table->unsignedBigInteger('member_user_id');
            $table->string('member_project_id', 255);
            $table->enum('member_role', ['owner', 'member']);
            $table->enum('member_status', ['active', 'deactive']);

            $table->timestamps();

            $table->foreign('member_user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('member_project_id')->references('project_id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign('members_member_user_id_foreign');
            $table->dropForeign('members_member_project_id_foreign');
        });
        Schema::dropIfExists('members');
    }
}
