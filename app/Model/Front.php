<?php

namespace App\Model;
use App\Model\Front;
use App\Model\Menu;
use Illuminate\Database\Eloquent\Model;
use App\Model\Ingredents;
use App\Model\Setting;
use App\Model\CouponAdd;
use DB;
use Cart;
use Darryldecode\Cart\CartCondition;
class Front extends Model
{
	protected $table = 'menus';
	public static function getSomeMenus(){
		$menus = Front::where('status','active')->get();
		$ingredent =array();
		if(!empty($menus)){
			foreach($menus as $key => $menu){
				$ingredent= Ingredents::whereIn('id',json_decode($menu->ingredent_id))->select(DB::raw('group_concat(name) as names'))->get();
				$menus[$key]['names'] = $ingredent[0]->names;
			}
		}
		return $menus;
	}
	public static function getSomeMenusPaginate(){
		$menus = Front::where('status','active')->paginate(8);
		$ingredent =array();
		if(!empty($menus)){
			foreach($menus as $key => $menu){
				$ingredent= Ingredents::whereIn('id',json_decode($menu->ingredent_id))->select(DB::raw('group_concat(name) as names'))->get();
				$menus[$key]['names'] = $ingredent[0]->names;
			}
		}
		return $menus;
	}
	public static function getSomePlans(){
		$plans = Plan::where('status','active')->paginate(4);
		return $plans;
	}
	public static function validatezipAction($zip){
		$exist = DB::table('delivery_locations')->where('zipcode', '=', $zip)->first();
		if ($exist !== null) {
			return true;
		}
	}
	public static function getActiveDeliveryDays(){
		$days = DB::table('delivery_dates')->where('status','=','active')->get();
		return $days;
	}
	public static function getPlanLimitById($id){
		$limit = DB::table('plans')->select('plan_meal_limit')->where('id','=',$id)->first();
		foreach($limit as $lim){
			$data = $lim;
		}
		return $data;
	}
	public static function getMenusAndNutritions(){
		$menus = DB::table('menus')
		->leftJoin('nutrician_facts', 'menus.id', '=', 'nutrician_facts.menu_id')
		->select('menus.*', 'nutrician_facts.nutrition_facts', 'nutrician_facts.calories','nutrician_facts.carbs','nutrician_facts.protein')
		->get();
		return $menus;
	}
	
	public static function getMenusAndNutritionsByMenuId($menuid){
		//DB::enableQueryLog(); 
		$menus = DB::table('menus')
		->leftjoin('nutrician_facts', 'menus.id', '=', 'nutrician_facts.menu_id')
		->select('menus.*', 'nutrician_facts.nutrition_facts', 'nutrician_facts.calories','nutrician_facts.serving_size','nutrician_facts.description','nutrician_facts.information')
		->where("menus.id","=",$menuid)
		->first();
		$ingredent =array();
		if(!empty($menus)){
			$ingredent = DB::table('ingredents')->whereIn('id',json_decode($menus->ingredent_id))->
			select('*')->get();
			$menus->ingredent = $ingredent;
			//dd(DB::getQueryLog());
			return $menus;
		}
		
	}
	public static function getPlanDetailsByPlanID($plantid){
		$plans = DB::table('plans')->where(['status'=>'active','id'=>$plantid])->first();
		return $plans;		
	}
	public static function insertuserdetails($user_data){
		$userid =  DB::table('users')->insertGetId($user_data);
		return $userid;		
	}
	public static function insertorderdetails($order_data){
		$orderid =  DB::table('orders')->insertGetId($order_data);
		return $orderid;		
	}
	public static function insertorderitemsdetails($order_items){
		$itemid =  DB::table('order_items')->insertGetId($order_items);
		return $itemid;		
	}
	public static function validatEmailExist($email){
		$ids =  DB::table('users')->select('id')->where('email','=',$email)->first();
// 		if($ids != 'null'){
// 		    $id = $ids['id'];
// 		   return  $id;
// 		}else{
// 		    return false;
// 		}
		if(isset($ids) && !empty($ids)){
			foreach($ids as $lim){
				$id = $lim;
			}
			return $id;   
		}
	}
	public static function getUserDetailsByEmail($email){
		$orderids = array();
		$cardsarr = array();
		$data = array();
		$users =  DB::table('users')->select('*')->where('email','=',$email)->first();
		foreach($users as $key => $value){
			if($key=='id'){
				$orders = DB::table('orders')
				->leftJoin('order_items', 'order_items.order_id', '=', 'orders.order_id')
				->select('*')
				->where('orders.customer_id','=',$value)
				->get();
				foreach($orders as $key2){
					$orderids[] = $key2->order_id;
				}
				$cards = DB::table('order_items')->select(DB::raw('DISTINCT (card_details) as cards'))->whereIn('order_id',$orderids)->get();
				foreach($cards as $key1){
					$cardsarr[] = $key1->cards;
				}
			}
			$data[$key] = $value;
		}
		$data['cards'] = $cardsarr;
		$data['orderids'] = $orders;
		return $data;
	}

	public function translation($locale = null){
		if($locale == null){
			$locale = strtolower(\App::getLocale());
		}
		return $this->hasMany('App\Model\MenuTranslation','menu_id')->where('locale', '=', $locale);
	}

	public static function getAllCategory(){
		$categ = DB::table('categories')->where('status','active')->get();
		return $categ;
	}
	public static function getMenusByCategory($catid){
		$menus = Front::select('menus.*')->where('category_id','=',$catid)->get();
		return $menus;
	}
	public static function validatezip($zip){
		return $result = DB::table('delivery_locations')->where('zipcode','=',$zip)->exists();
	}
	public static function getDeliveryDays(){
		$days = DB::table('delivery_days')->get();
		if(isset($days)){
			return  Front::checkDelivery($days);
		}
	}
	public static function getMenusById($menuid){
		$menus = Front::where('id','=',$menuid)->first();
		//$menus = DB::table('menus')->select('*')->where('id','=',$menuid)->first();
		return $menus;
	}
	
     
    public static function checkDelivery($days)
    {
    	if(!empty($days)){
    		$date = new \DateTime();
    		$sel_day =  $date->format('l');
	        $day_num = date('N');
	        // $day ="0";
     //    if($sel_day != 'none'){
     //    echo $day_num = $sel_day;
        
    	// }
	        $day = '';
	        
	        foreach($days as $key => $day_time){
	        	if($day_num == date('N',strtotime($day_time->order_day_check)) && (date('H:i') <= $day_time->order_before_time)) { 
					$day = $day_time->delivery_day;
       		 	}

	        }
	        return Front::GetNextDateList($day);
        // if(($day_num <= 1) && (date('H:i') <= $days[0]->order_before_time)) { 

        //     $day = $days[0]->delivery_day;
        
        // } elseif(($day_num <= 2) && (date('H:i') <= $days[0]->order_before_time)) { 

        //     $day = $days[0]->delivery_day;
        
        // }
        // elseif(($day_num <= 3) && (date('H:i') <= $days[1]->order_before_time)) { 

        //     $day = $days[1]->delivery_day;
        
        // }
        // elseif(($day_num <= 4) && (date('H:i') <= $days[1]->order_before_time)) { 

        //     $day = $days[1]->delivery_day;
        
        // }
        // elseif(($day_num <= 5) && (date('H:i') <= $days[0]->order_before_time)) { 

        //     $day = $days[0]->delivery_day;
        
        // }
        // elseif(($day_num <= 6) && (date('H:i') <= $days[0]->order_before_time)) { 

        //     $day  = $days[0]->delivery_day;
        
        // }
        // elseif(($day_num <= 7) && (date('H:i') <= $days[0]->order_before_time)) { 

        //     $day = $days[0]->delivery_day;
        
        // }
	      
        // return  $day;
    	}
    }

    public static function GetNextDateList($day){
    	  $next_date_limit = Front::getDeliveryDateLimit();
    	  if(isset($next_date_limit->next_date_range)){
    	  	$next_days = $next_date_limit->next_date_range;
    	  }else{
    	  	$next_days = 2;
    	  }
    	  $dates = array(); 
    	  // $day ='Monday';  	  
	        if($day =='Monday'){
	        	for($i=1; $i<=$next_days; $i++){
	        		if($i ==1){
	        			array_push($dates,date('d-m-Y', strtotime('next Monday')));
			            array_push($dates,date('d-m-Y', strtotime('next thursday')));
	        		}else{
	        			array_push($dates,date('d-m-Y', strtotime('+'.($i-1).' week  monday')));
			            array_push($dates,date('d-m-Y', strtotime('+'.($i-1).' week  thursday')));
	        		}
	        	}
	        }else if($day =='Thursday'){ 
	        	for($i=1; $i<=$next_days; $i++){
	        		if($i ==1){
	        			array_push($dates,date('d-m-Y', strtotime('next  thursday')));
			        	array_push($dates,date('d-m-Y', strtotime('+'.$i.' week monday')));
	        		}else{
	        		 array_push($dates,date('d-m-Y', strtotime('+'.($i-1).' week thursday')));
			         array_push($dates,date('d-m-Y', strtotime('+'.($i).' week monday')));
	        		}
	        	}
	        }
	        
	        return $dates;
    }
    public static function getOrderItemsById($id){
		$items = DB::table('order_items')->where('order_id','=',$id)->get();
		return $items;
	}

	public static function SaveOrderItem($order_id){
		$cart_data = Cart::getContent();
		foreach($cart_data as $key => $val){
			$order_item = new OrderItem();
			$order_item->order_id = $order_id;
			$order_item->menu_id = $val->id;
			$order_item->item_name = $val->name;
			$order_item->item_price = $val->price;
			$order_item->item_quantity = $val->quantity;
			$order_item->delivery_date = date('Y-m-d', strtotime($val->attributes->delivery_date));
			$order_item->item_thumb = $val->attributes->menu_thumb;
			$order_item->item_sort_desc = $val->attributes->sort_description;
			$order_item->order_status = 'Pending';
            $order_item->save();
		}
		return true;
	}
	public static function getSecretKey()
	{
		return DB::table('setting')->pluck('secret_key');	
	}

	public static function getDeliveryDateLimit()
	{
		return Setting::select('next_date_range')->first();	
	}
	public static function GetCouponIdByCoupon($request){
		return CouponAdd::where('coupon_code',$request->coupon)->select('id','coupon_percent')->first();
	}
	public static function CouponApplied($coupon_details = array(),$coupon_percent){
		$cartCondition = new CartCondition([
            'name' => 'sdfsad',
            'type' => 'Sale',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '-'.$coupon_percent.'%',
            'attributes' => array()
        ]);
        if(Cart::condition($cartCondition)){
        	return Cart::getTotal();
        }else{
        	return false;
        }
        
	}
}
