<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutricianFactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrician_facts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('description');
            $table->text('nutrition_facts');
            $table->text('serving_size');
            $table->text('calories');
            $table->text('carbs')->nullable();
            $table->text('fat')->nullable();
            $table->text('protein')->nullable();
            $table->text('information');
            $table->bigInteger('menu_id')->unsigned();
            $table->enum('status', ['active', 'inactive'])->default('active');;
            $table->timestamps();
        });
         Schema::table('nutrician_facts', function($table)
        {

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrician_facts');
    }
}
