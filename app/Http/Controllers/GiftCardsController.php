<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GiftCard;

class GiftCardsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$giftcards = GiftCard::paginate(12);
        return view('admin.giftcards.index',compact('giftcards'));
    }
}
