<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->enum(['image','video','audio']);
            $table->string('lang')->enum(['ar','fr','en']);
            $table->bigInteger('site_id')->unsigned()->nullable();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->bigInteger('path_id')->unsigned()->nullable();
            $table->foreign('path_id')->references('id')->on('path_sites')->onDelete('cascade');
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
        Schema::dropIfExists('media');
    }
}
