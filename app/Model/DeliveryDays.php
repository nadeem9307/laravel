<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliveryDays extends Model
{
    //
    protected $table = 'delivery_days';
    protected $fillable = ['order_day_check','order_before_time','delivery_day'];
}
