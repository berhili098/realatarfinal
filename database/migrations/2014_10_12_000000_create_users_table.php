<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('utype')->enum(['ADM','USR'])->default('USR');
            $table->string('theme')->default('skin-orange');
            $table->string('description',2048)->nullable();
            $table->bigInteger('phoneNo')->nullable();
            $table->string('address',2048)->nullable();
            $table->string('birthdate')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('youtube')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('photo')->default('agent.jpg');
            $table->bigInteger('editedBy')->nullable();
            $table->bigInteger('deletedBy')->nullable(); 
            $table->bigInteger('createdBy')->nullable(); 
            $table->boolean('status')->enum([0,1])->default(0);
            $table->boolean('delete')->enum([0,1])->default(0);
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
};
