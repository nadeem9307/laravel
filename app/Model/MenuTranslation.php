<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    protected $table = 'menu_translations';
    public $timestamps = false;
    protected $fillable = ['menu_id','menu_name','sort_description','menu_description','features'];

    public function menu(){
	  return $this->belongsTo('Model/Menu');
	}
}
