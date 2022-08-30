<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('path_sites', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('site_id')->unsigned();
            $table->bigInteger('path_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->foreign('path_id')->references('id')->on('paths')->onDelete('cascade');
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
        Schema::dropIfExists('path_sites');
    }
}
