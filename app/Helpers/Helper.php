<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Setting;
use App\Model\OrderRating;
use Illuminate\Support\Facades\Auth;

class Helper {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function OrderStatus($order_id) {
    	$order_item = OrderItem::where('order_id',$order_id)->select('order_status')->get()->toArray();
    	$status = array_column($order_item, 'order_status');
    	if(count(array_count_values($status)) == 1 && $status[0] == 'Pending'){
    		return 'Pending';
    	} else if(count(array_count_values($status)) == 1 && $status[0] == 'Processing'){
    		return 'Processing';
    	}
    	else if(count(array_count_values($status)) == 1 && $status[0] == 'Rejected'){
    		return 'Rejected';
    	}
    	else if(count(array_count_values($status)) == 1 && $status[0] == 'Delivered'){
    		return 'Delivered';
    	}else{
    		return 'Pending';
    	}
    }
    public static function SiteEmailContact(){
    	$setting = Setting::select('site_contact','site_email')->first();
    	return $setting;
    }
    public static function CustomerReviewExist($orderid='')
    {
    	if(!empty($orderid)){
    		if(OrderRating::where(['order_id'=> $orderid])->exists()){
    			return true;		
    		}
    	}
    }
    public static function CustomerReviewRating($orderid='')
    {
        if(!empty($orderid)){
            $star = OrderRating::where(['order_id'=> $orderid,'customer_id'=>Auth::user()->id])->pluck('rate_star');
            return $star;        
        }
    }
}