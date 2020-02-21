<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CouponAdd extends Model
{
    protected $table = 'coupon_adds';
    protected $fillable = ['coupon_code','coupon_percent','coupon_status','coupon_end_date','	updated_at']; //

    public function coupon_adds()
    {
        return $this->hasMany('App\Model\CouponAdd','foreign_key');
    }

}
