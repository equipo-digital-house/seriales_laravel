<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->text('name');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('serie_id');
            $table->unsignedBigInteger('level_id');
            $table->timestamps();
            //relaciones
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
        //Schema::table('questions',function(Blueprint $table){
        //  $table->dropForeign('questions_serie_id_foreign');
        //  $table->dropColumn('serie_id');
        //  $table->dropForeign('questions_level_id_foreign');
      //  $table->dropColumn('level_id');
        //Schema::drop('questions');
      //});
    }
}
