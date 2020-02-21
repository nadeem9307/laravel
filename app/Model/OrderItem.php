<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OrderItem;
class OrderItem extends Model
{
    protected $table = 'order_items';

	 public function order() {
        return $this->belongsTo('App\Model\Order','order_id');   
    }
    public function plans() {         
       return $this->belongsTo('App\Model\Plan','plan_id');   
   }


    public static function getRevenue(){
      return Order::sum('order_total');
   }
   public static function GetOrderItem($id){
    if($id){
       return OrderItem::where('order_id',$id)->orderBy('delivery_date','asc')->get();
    }else{
      abort(403);
    }
    // $orders = OrderItem::with(['plans'])->paginate(12);
   }
   
    
}
