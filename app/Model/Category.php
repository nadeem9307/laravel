<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Category extends Model
{
    protected $table = 'categories';
      protected $fillable = [
        'name', 'description' ];

    public function translation($locale = null){
		if($locale == null){
			$locale = strtolower(\App::getLocale());
		}
		
	  	return $this->hasMany('App\Model\CategoryTranslation')->where('locale', '=', $locale);
	}
	public static function getAllCategory(){
        $cat = Category::select('*')->get();
        return $cat;
    }
}
