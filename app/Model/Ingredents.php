<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ingredents extends Model
{
	protected $table = 'ingredents';
	protected $fillable = [
		'name', 'description','thumb'];
		public function translation($locale = null){
			if($locale == null){
				$locale = strtolower(\App::getLocale());
			}
			return $this->hasMany('App\Model\IngredentTranslation','ingredent_id')->where('locale', '=', $locale);
		}
	}
