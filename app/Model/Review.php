<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Review extends Model
{
    protected $table = 'review';
    protected $fillable = ['user_id','subject','description'];

    public static function getAllReviews(){
    	 $data = Review::leftjoin('users', 'users.id', '=', 'review.user_id')->select('review.*', 'users.email')->paginate(10);
        return $data;
    }
}
