<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Faq extends Model
{
    protected $table = 'faq';
      protected $fillable = [
        'title', 'description' ];

    public function translation($locale = null){
		if($locale == null){
			$locale = strtolower(\App::getLocale());
		}
		
	  	return $this->hasMany('App\Model\FaqTranslation')->where('locale', '=', $locale);
	}
}
