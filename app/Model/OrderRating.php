<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OrderRating;

class OrderRating extends Model
{
     protected $table = 'order_rating';
     protected $fillable = ['order_id', 'customer_id','rate_star','description'];
     public static function getallratings()
     {
     	$data = OrderRating::leftjoin('users','users.id','=','order_rating.customer_id')->select('users.name','users.img_path','order_rating.rate_star','order_rating.description')->where('order_rating.rate_star','>=',4)->get();
     	return $data;
     }
}
