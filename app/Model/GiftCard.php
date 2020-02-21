<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    //
    //
    protected $table = 'gift_cards';
    protected $fillable = ['recipient_email','coupon_code','coupon_amt','coupon_status','sender_email'];
}
