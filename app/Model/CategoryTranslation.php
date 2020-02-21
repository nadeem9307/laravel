<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'category_translations';
    public $timestamps = false;
    protected $fillable = ['name','description'];

    public function category(){
	  return $this->belongsTo('Model/Category');
	}
}
