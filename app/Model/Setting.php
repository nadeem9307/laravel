<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $fillable = ['site_contact','site_email','secret_key','publish_key','next_date_range'];
}
