<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';
    protected $fillable = ['page_id','title','sub_title','description','content_thumb','status'];

    public function translation($locale = null){
        if($locale == null){
            $locale = strtolower(\App::getLocale());
        }
        
        return $this->hasMany('App\Model\ContentTranslation')->where('locale', '=', $locale);
    }
}
