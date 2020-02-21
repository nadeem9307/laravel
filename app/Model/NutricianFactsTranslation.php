<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NutricianFactsTranslation extends Model
{
    //
    protected $table = 'nutrician_fact_translations';
    public $timestamps = false;
     protected $fillable = [
        'menu_id', 'description','nutrition_facts','serving_size','calories','carbs','fat','protein','information'];
    public function nutricianfacts(){
	  return $this->belongsTo('Model/NutricianFacts');
	}
}
