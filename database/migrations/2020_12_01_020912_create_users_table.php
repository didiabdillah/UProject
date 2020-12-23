<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 255)->primary()->unique();
            $table->string('user_provider_id', 255)->nullable();
            $table->string('user_name', 255);
            $table->string('user_email', 255)->unique();
            $table->string('user_password', 255);
            $table->enum('user_role', ['admin', 'user']);
            $table->timestamp('user_email_verified_at')->nullable();
            $table->string('user_image', 512);
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
        Schema::dropIfExists('users');
    }
}
