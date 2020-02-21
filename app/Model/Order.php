<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Order;
class Order extends Model
{
    protected $table = 'orders';
     protected $fillable = [
        'order_id', 'customer_id','order_date'];

    public function user() {         
       return $this->belongsTo('App\User','customer_id');   
   }

    public function menus() {
        return $this->hasMany('App\Model\Menu','id');
    }

   public static function GetAllOrder(){
   	return $orders = Order::with(['user'])->orderBy('order_id', 'desc')->paginate(12);
   	// dd($orders);
   }
    public static function GetOrder($order_id){
      if($order_id){
        return $orders = Order::with(['user'])->where('order_id',$order_id)->first();
      }else{
        abort(403);
      }
   }
   public static function GetAllOrderByDate($request){  
    $orders = Order::with(['user']);
              if(isset($request->from_date) && isset($request->to_date)){
                     $orders->whereBetween('order_date',array($request->from_date,$request->to_date));
                  }
                   if(isset($request->order_status)){
                     $orders->where('order_status',$request->order_status);
                  }
         return $orders->paginate(12);
              
    //return $orders = Order::with(['user'])->paginate(12);
  }

  public static function GetAllOrderData($request){  
    $orders = Order::join('order_items','orders.order_id','=','order_items.order_id')->with(['user']);
              if(isset($request->from_date) && isset($request->to_date)){
                     $orders->whereBetween('order_date',array($request->from_date,$request->to_date));
                  }
                   if(isset($request->order_status)){
                     $orders->where('order_status',$request->order_status);
                  }
         return $orders->orderBy('orders.order_id', 'desc')->get();
              
    //return $orders = Order::with(['user'])->paginate(12);
  }
}
