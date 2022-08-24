<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('question_en');
            $table->string('question_fr');
            $table->string('question_ar');
            $table->string('reponse1_ar');
            $table->string('reponse2_ar');
            $table->string('reponse3_ar')->nullable();
            $table->string('reponse4_ar')->nullable();
            $table->string('reponse1_fr');
            $table->string('reponse2_fr');
            $table->string('reponse3_fr')->nullable();
            $table->string('reponse4_fr')->nullable();
            $table->string('reponse1_en');
            $table->string('reponse2_en');
            $table->string('reponse3_en')->nullable();
            $table->string('reponse4_en')->nullable();
            $table->string('correcte_ar')->enum([1,2,3,4]);
            $table->string('correcte_en')->enum([1,2,3,4]);
            $table->string('correcte_fr')->enum([1,2,3,4]);
            $table->bigInteger('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->boolean('status')->enum([0,1])->default(0);
            $table->boolean('delete')->enum([0,1])->default(0);  
            $table->bigInteger('editedBy')->unsigned()->nullable();
            $table->foreign('editedBy')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('deletedBy')->unsigned()->nullable();
            $table->foreign('deletedBy')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('quizzes');
    }
}
