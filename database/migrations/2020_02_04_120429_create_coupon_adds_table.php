<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_adds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('coupon_code');
            $table->text('coupon_percent');
            $table->enum('coupon_status',['active','inactive'])->default('active');
            $table->dateTime('coupon_end_date');
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
        Schema::dropIfExists('coupon_adds');
    }
}
