<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sender_email');
            $table->string('recipient_email');
            $table->text('coupon_code');
            $table->string('coupon_amt');
            $table->enum('coupon_status',['redeemed','not redeem'])->default('not redeem');
            $table->dateTime('coupon_redeem_date')->nullable();
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
        Schema::dropIfExists('gift_cards');
    }
}
