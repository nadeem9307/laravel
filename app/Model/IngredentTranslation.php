<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IngredentTranslation extends Model
{
    protected $table 	= 'ingredent_translations';
    public $timestamps 	= false;
    protected $fillable = ['name','description'];

    public function ingredent(){
	  return $this->belongsTo('Model/Ingredents');
	}
}
