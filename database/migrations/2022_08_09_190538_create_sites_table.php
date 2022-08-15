<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_fr')->nullable();
            $table->string('name_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_fr')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('openTime')->nullable();
            $table->string('duration')->nullable();
            $table->double('price')->default(0);
            $table->boolean('status')->enum([0,1])->default(0);
            $table->boolean('delete')->enum([0,1])->default(0);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('photo',50)->default('No_Image_Available.jpg');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('editedBy')->nullable();
            $table->bigInteger('deletedBy')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('sites');
    }
}
