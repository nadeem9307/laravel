<?php

namespace App\Model;
use App\Model\Menu;
use Illuminate\Database\Eloquent\Model;
use App\Model\Ingredents;
use DB;
class Menu extends Model
{
     protected $table = 'menus';
     protected $fillable = [
        'category_id', 'menu_name','sort_description','menu_description','menu_type','menu_size','price',',ingredent_id','menu_thumb'];

    public static function getAllMenus(){
    	$menus = Menu::join('categories','menus.category_id','=','categories.id')->where('menus.status','active')->select('menus.*','categories.name as category_name')->paginate(12);
    	$ingredent =array();
    	if(!empty($menus)){
    		foreach($menus as $key => $menu){
    			$ingredent= Ingredents::whereIn('id',json_decode($menu->ingredent_id))->select(DB::raw('group_concat(name) as names'))->get();
    			$menus[$key]['names'] = $ingredent[0]->names;

    		}
    	}
    	return $menus;
    }
    public static function getMenus($order_items){
        if(isset($order_items->menu_id)){
            return Menu::whereIn('id',json_decode($order_items->menu_id,true))->get();
        }
        return false;
    
    }
    public function translation($locale = null){
        if($locale == null){
            $locale = strtolower(\App::getLocale());
        }
        
        return $this->hasMany('App\Model\MenuTranslation')->where('locale', '=', $locale);
    }

    public static function getMenusAndNutritions(){
        $menus = Menu::leftjoin('nutrician_facts', 'menus.id', '=', 'nutrician_facts.menu_id')->where('menus.status','active')->select('menus.*', 'nutrician_facts.nutrition_facts', 'nutrician_facts.calories','nutrician_facts.carbs','nutrician_facts.protein')->get();
        return $menus;
    }
    public static function getMenusAndNutritionsByMenuId($menuid){
        //DB::enableQueryLog(); 
        $menus = Menu::leftjoin('nutrician_facts', 'menus.id', '=', 'nutrician_facts.menu_id')
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
        
}
