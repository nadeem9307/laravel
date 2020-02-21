<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutricianFactTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrician_fact_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nutrician_fact_id');
            $table->string('locale')->index();
            $table->text('description');
            $table->text('information');
            $table->text('nutrition_facts');
            $table->unique(['nutrician_fact_id','locale']);
            $table->foreign('nutrician_fact_id')->references('id')->on('nutrician_facts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrician_fact_translations');
    }
}
