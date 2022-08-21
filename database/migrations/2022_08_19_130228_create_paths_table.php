<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paths', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr')->unique();
            $table->string('name_ar')->unique();
            $table->string('name_en')->unique();
            $table->longText('description_fr')->default('pas de description disponible');
            $table->longText('description_ar')->default();
            $table->longText('description_en');
            $table->string('length');
            $table->string('duration');
            $table->string('photo')->default('No_Image_Available.jpg');
            $table->string('video')->nullable();
            $table->boolean('delete')->enum([0,1])->default(0);  
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('editedBy')->unsigned()->nullable();
            $table->foreign('editedBy')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('deletedBy')->unsigned()->nullable();
            $table->foreign('deletedBy')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('paths');
    }
}
