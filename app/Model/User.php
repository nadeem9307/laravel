<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
     protected $fillable = [
        'name', 'last_name','first_name','address_line_1','city','state','zip_code',',phone','email'];
}
