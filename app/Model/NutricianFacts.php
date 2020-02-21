<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NutricianFacts extends Model
{
     protected $table = 'nutrician_facts';
     protected $fillable = [
        'menu_id', 'description','nutrition_facts','serving_size','calories','carbs','fat','protein','information'];
        public function translation($locale = null){
			if($locale == null){
				$locale = strtolower(\App::getLocale());
			}
			return $this->hasMany('App\Model\NutricianFactsTranslation','nutrician_fact_id')->where('locale', '=', $locale);
		}
}
