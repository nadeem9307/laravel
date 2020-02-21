<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('item_id');
            $table->bigInteger('order_id')->unsigned();
            $table->text('menu_id');
            $table->text('item_name');
            $table->text('item_sort_desc');
            $table->text('item_quantity');
            $table->text('item_price');
            $table->date('delivery_date');
            $table->text('item_thumb');
            $table->enum('order_status', ['Pending', 'Processing','Rejected','Delivered']);
            $table->string('shipping_charges')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
