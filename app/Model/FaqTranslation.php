<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    protected $table = 'faq_translation';
    public $timestamps = false;
    protected $fillable = ['title','description'];

    public function category(){
	  return $this->belongsTo('Model/Faq');
	}
}
