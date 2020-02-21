<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CouponAssign extends Model
{
     protected $table = 'coupon_assigns';
    // protected $fillable = ['coupon_code','coupon_percent','coupon_status','coupon_end_date','	updated_at'];
    //coupon_assigns
      public function couponassigns()
    {
        return $this->belongsTo('App\Mode\CouponAssign');
    }


      public static function GetAllAssignedCoupon(){
      	return User::leftjoin('coupon_assigns as ca','ca.user_id','=','users.id')
      					->leftjoin('coupon_adds as c','c.id','=','ca.coupon_id')->where('users.type','customer')
      				->select('users.*','c.coupon_code','c.coupon_percent','c.coupon_end_date','ca.coupon_status','ca.coupon_expiry')->paginate(15);
      	}
      public static function GetUserAssignedCoupon($request){
        return User::leftjoin('coupon_assigns as ca','ca.user_id','=','users.id')
                ->leftjoin('coupon_adds as c','c.id','=','ca.coupon_id')->where('users.type','customer')->whereIn('ca.user_id',$request->ids)->where(function($query) {
                  $query->where('ca.coupon_expiry','>=',date('Y-m-d'))
                    ->Where('ca.coupon_status','unused');
            })->select('users.*','c.coupon_code','c.coupon_percent','c.coupon_end_date','ca.coupon_status','ca.coupon_expiry')->get()->toArray();
      }

      
}
