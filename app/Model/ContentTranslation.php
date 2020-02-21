<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContentTranslation extends Model
{
    protected $table = 'content_translation';
    public $timestamps = false;
    protected $fillable = ['content_id','title','sub_title','description'];
    public function content(){
	  return $this->belongsTo('Model/Content');
	}
}
