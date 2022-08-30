<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->string('uid')->primary();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('birthday')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('level')->nullable();
            $table->integer('points')->nullable();
            $table->boolean('isPremium')->enum([true,false])->default(false);
            $table->boolean('isVerified')->enum([true,false])->default(false);
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
        Schema::dropIfExists('clients');
    }
}
