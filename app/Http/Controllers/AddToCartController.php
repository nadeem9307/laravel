<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Menu;
use App\Model\Front;
use Cart;
use Session;

class AddToCartController extends Controller
{
    public function AddToCart(Request $request) {
        $id = $request->product_id;
        $items = Menu::find($id);
        //dd($items->translation()->first()->menu_name,$items->menu_name);
        $session = $request->session();
		$cart_item = Cart::get($id);
		if($request->action != 'minus'){
			if(!empty($cart_item)){
        	$cartItem = array(
			   'quantity' => 1,
			);
            Cart::update($cart_item['id'],$cartItem);
	        } else {
	        	$cartItem = array(
				    'id' => $items['id'],
				    'name' => $items->translation()->first() ? $items->translation()->first()->menu_name : $items->menu_name,
				    'price' => $items['price'],
				    'quantity' => 1,
				    'attributes' => array(
				        'menu_thumb'=>$items['menu_thumb'],
				        'delivery_date'=>'',
				    	'sort_description'=>$items->translation()->first() ? $items->translation()->first()->sort_description : $items->sort_description
				      )
				);
	            Cart::add($cartItem);
	        }
		}else{
			if(!empty($cart_item) && $cart_item['quantity']>1){
				$qty = -1;
	        	$cartItem = array(
				   'quantity' => $qty,
				);
	            Cart::update($cart_item['id'],$cartItem);
	        }
		}
       
       	$cartCollection = Cart::getContent();
        $response = array(
			'status' => 'success',
			'subTotal' => Cart::getSubTotal(),
			'count' => $cartCollection->count(),
			'data' => view('front.ajax_layouts.cart')->render()
		);
		return response()->json($response);
    }

    public function removeItem(Request $request){
		if($request->action == 'clear_all'){
			Cart::clear();
		}else{
			$id = $request->product_id;
			Cart::remove($id);
		}
		$cartCollection = Cart::getContent();
		$response = array(
			'status' => 'success',
			'subTotal' => Cart::getSubTotal(),
			'count' => $cartCollection->count(),
			'data' => view('front.ajax_layouts.cart')->render()
		);
		return response()->json($response);
    }

    public function ProductDateUpdate(Request $request){
    	$id = $request->product_id;
    	$cart_item = Cart::get($id);
    	$cart = array(
				    'name' => $cart_item['name'],
				    'price' => $cart_item['price'],
				    'attributes' => array(
				        'menu_thumb'=>$cart_item['attributes']['menu_thumb'],
				        'delivery_date'=>$request->attribute,
				    	'sort_description'=>$cart_item['attributes']['sort_description'] 
				      )
				);
			Cart::update($cart_item['id'],$cart);
    		$cartCollection = Cart::getContent();
        	$response = array(
			'status' => 'success',
			'subTotal' => Cart::getSubTotal(),
			'count' => $cartCollection->count(),
			'data' => view('front.ajax_layouts.cart')->render()
		);
		return response()->json($response);
    }
  	
}
