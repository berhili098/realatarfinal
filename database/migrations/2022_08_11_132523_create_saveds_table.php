<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateSavedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saveds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->index()->constrained()->references('id')->on('sites')->cascadeOnDelete();
            $table->string('client_id');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `saveds` ADD CONSTRAINT `saveds_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients`(`uid`) ON DELETE CASCADE ON UPDATE RESTRICT;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saveds');
    }
}
