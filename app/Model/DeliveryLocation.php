<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliveryLocation extends Model
{
    protected $table = 'delivery_locations';
     protected $fillable = [
        'zipcode'];	
}
