<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city_ar',50)->default('اسم المدينة غير متوفر');
            $table->string('city_fr',50)->default('nom de la ville indisponible');
            $table->string('city_en',50)->default('city name unavailable');
            $table->longText('description_ar')->default('وصف المدينة غير متوفر');
            $table->longText('description_fr')->default('description de la ville indisponible');
            $table->longText('description_en')->default('city description unavailable');
            $table->string('photo',50)->default('No_Image_Available.jpg');
            $table->string('latitude',255)->nullable();
            $table->string('longitude',255)->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status')->enum([0,1])->default(0);
            $table->boolean('delete')->enum([0,1])->default(0);
            $table->bigInteger('editedBy')->nullable();
            $table->bigInteger('deletedBy')->nullable();
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
        Schema::dropIfExists('cities');
    }
}
