<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()   
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('order_id');
            $table->unsignedBigInteger('customer_id');
            $table->enum('order_status', ['Pending', 'Processing','Rejected','Delivered']);
            $table->date('order_date');
            $table->string('full_name')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip_code')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('card_details')->nullable();
            $table->string('order_total')->nullable();
            // $table->date('delivery_date');
            $table->date('shipped_date')->nullable();
            $table->enum('payment_status',['Pending', 'Processing','Failed','Completed']);
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
