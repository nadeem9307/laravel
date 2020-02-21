<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PlansTranslation extends Model
{
    //
    protected $table = 'plans_translations';
    public $timestamps = false;
    protected $fillable = ['name','text'];

    public function plan(){
	  return $this->belongsTo('Model/Plan');
	}
}
