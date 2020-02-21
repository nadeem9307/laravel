<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';
    protected $fillable = [
        'plan_name', 'plan_description','plan_meal_limit','plan_meal_type','plan_per_meal_price','plan_price'];

    public function plans() {
        return $this->hasMany('App\Model\Plan','id');
    }

    public function translation($locale = null){
        if($locale == null){
            $locale = strtolower(\App::getLocale());
        }
        
        return $this->hasMany('App\Model\PlansTranslation')->where('locale', '=', $locale);
    }
     public static function getPlan($order_items){
    	if(isset($order_items->plan_id)){
            return Plan::where('id',$order_items->plan_id)->first();
        }
        return false;
    }
}
