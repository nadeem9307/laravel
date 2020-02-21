<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Experts extends Model
{
     protected $table = 'experts';
      protected $fillable = ['name', 'designation','description','twitter_links','fb_links','pinterest_links','linkedin_links',',img_path'];

}
