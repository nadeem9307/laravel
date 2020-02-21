<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('menu_name');
            $table->string('sort_description');
            $table->text('menu_description');
            $table->enum('menu_type', ['veg', 'non veg']);
            $table->string('menu_size');
            $table->text('menu_thumb');
            $table->text('ingredent_id');
            $table->string('features')->nullanle();
            $table->string('price');
            $table->bigInteger('category_id')->unsigned();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        Schema::table('menus', function($table)
        {
          $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
