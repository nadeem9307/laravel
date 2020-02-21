<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Front;
use App\Model\Menu;
use App\Model\DeliveryDays;
use App\Model\GiftCard;
use App\Model\Category;
use App\Model\Review;
use App\Http\Requests\MenusRequest;
use Config;
use Session;
use Mail;
use Response;
use Cart;
use Vinkla\Instagram\Instagram;
use App\Model\User;
use App\Model\Order;
use App\Model\Content;
use App\Model\CouponAssign;
use App\Model\Experts;
use App\Model\Faq;
use App\Model\OrderRating;

class FrontController extends Controller
{
	public function index()
	{
		$menus = Front::getSomeMenusPaginate();
		$plans = Front::getSomePlans();

		return view('front.index',compact('menus','plans'));
	}
	public function join(Request $request)
	{
		return view('front.sign-up');
	}

	public function validatezip(Request $request)
	{
		if(!$request->all()){
			return redirect()->route('join-now');
		}
		$request->validate([
			'email'=>'required|email',
			'zip'=>'required'
		]);
		if($request->coupon){
			$coupon = $request->coupon;
			//dd($request->all());
			if(GiftCard::where(['recipient_email'=> $request->email,'coupon_code'=>$coupon])->exists()){
				$coupon_amount = GiftCard::select('coupon_amt')->where(['recipient_email'=> $request->email,'coupon_code'=>$coupon])->first();
				//dd($coupon_amount);
				session(['coupon_code' => $request->coupon,'coupon_amount'=>$coupon_amount['coupon_amt']]);
			}
		}
		$status = Front::validatezipAction($request->zip);
		$date = new \DateTime();
		$cartdata = array();
		if($status){
			if(!empty($request->product_id)){
				$Data = Front::where('id',$request->product_id)->first();
			//	dd($Data['id']);
				if ($Data != null) {
					if(!Auth::user()){
						Cart::clear();
					}
					$cart_item = Cart::get($Data['id']);
					if(empty($cart_item)){
						Cart::add(array(
						    'id' => $Data['id'], // inique row ID
						    'name' => $Data->translation()->first() ? $Data->translation()->first()->menu_name : $Data['menu_name'],
						    'price' => $Data['price'],
						    'quantity' => 1,
						    'attributes' => array(
						    	'menu_thumb'=>$Data['menu_thumb'],
						    	'delivery_date'=>'',
						    	'sort_description'=>$Data->translation()->first() ? $Data->translation()->first()->sort_description : $Data['sort_description']
						    )
						));
					}
				}
				$email=$request->email;
				$zip = $request->zip;
				$meal_id = $request->product_id;
				$delivery_date = Front::getDeliveryDays();
				// dd($delivery_date);
				// dd($delivery_date);
				// $delivery_date = DeliveryDays::paginate(12);
				// $delivery_day =  date('l',strtotime('next ' .$delivery_date));
				// $delivery_dates =  date('Y-m-d',strtotime('next ' .$delivery_date));
				$delivery_day =  date('l',strtotime( "next monday" ));
				// $delivery_dates =  date('Y-m-d',strtotime( "next monday" ));
				$menus = Menu::getMenusAndNutritions();
				$selected_meal =  Front::getMenusById($meal_id);
                 //return view('front.delivery_dates',compact('email','zip','plan_id','delivery_dates'));
				$coupon_value = null;
				if ($request->session()->exists('coupon_code')) {
					$coupon_value = $request->session()->get('coupon_amount');
					$coupon_name = $request->session()->get('coupon_code');
					$request->session()->flash('status', $coupon_value);
				}
				return view('front.choose-meals',compact('email','zip','meal_id','delivery_day','delivery_date','menus','coupon_value'));
			}else{
				$email=$request->email;
				$zip = $request->zip;
				$menus = Front::getSomeMenus();
				$plans = Front::getSomePlans();  
				//$cats = Front::getAllCategory();
				$cats = Category::getAllCategory();
				return view('front.plans-and-menu',compact('email','zip','menus','plans','cats'));
			}
		}else{
			return back()->withErrors('Our bike is not yet powerful enough to reach you, please enter a different address(such as your office) or contact us to find a solution');
		}
		return back()->with('error','Enter Correct Credentials')->withinput($request->only('email'));
	}
	public function ChooseMeal(Request $request){
		$coupon_value = null;
		if ($request->session()->exists('coupon_code')) {
			$coupon_value = $request->session()->get('coupon_amount');
			$coupon_name = $request->session()->get('coupon_code');
		}
		$email=$request->email;
		$zip = $request->zip;
		$plan_id = $request->plan_id;
		$delivery_dates = $request->del_date;
		$delivery_day = $request->del_day;
		$limit = Front::getPlanLimitById($plan_id);
		$menus = Menu::getMenusAndNutritions();
		return view('front.choose-meals',compact('email','zip','plan_id','delivery_dates','delivery_day','limit','menus','coupon_value'));
	}
	public function postmenu(Request $request){
		$menus = Menu::getMenusAndNutritionsByMenuId($request->message);
		$response = array(
			'status' => 'success',
			'subject' => view('front.ajax_layouts.menu_modal')->with(['menus' =>$menus,'limit'=>$request->limit])->render()
		);
		return response()->json($response);
	}
	public function Login(){
		return view('front.login');
	}
	public function LoginAction(Request $request)
	{
		$request->validate([
			'email'=>'required|email',
			'password'=>'required|min:4'
		]);
		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'type'=>'customer'])){
			
			//print_r($users); die;
			if(Auth::user()->type == 'customer'){
				return redirect()->route('my-profile');
			}
		}else{
			return back()->withErrors('Enter Correct Credentials')->withinput($request->only('email'));
		}
		return back()->withErrors('Enter Correct Credentials')->withinput($request->only('email'));
	}
	public function PlansMenu(){
		$menus = Front::getSomeMenus();
		$plans = Front::getSomePlans();
		$cats = Front::getAllCategory();
		return view('front.plans-and-menu',compact('menus','plans','cats'));
	}
	public function Gift(){
		return view('front.gifts');
	}
	public function NextForCheckout(Request $request)
	{

		$coupon_value = null;
		$coupon_name = null;
		if ($request->session()->exists('coupon_code')) {
			$coupon_value = $request->session()->get('coupon_amount');
			$coupon_name = $request->session()->get('coupon_code');
			$request->session()->flash('status', $coupon_value);
		}
    // dd($request->all());
		$this->validate($request, [
			'email'=>'required|email',
			'zip'=>'required',
		]);
		$delivery_dates = Front::getDeliveryDays();
		$email =$request->email;
		$zip=$request->zip;
		$delivery_day = $request->delivery_day;
		$limit = $request->limit;
		$menus = Cart::getContent();
		$cart_total =  Cart::getSubTotal();
		
		$plandetails = Front::getPlanDetailsByPlanID($request->plan_id);
		return view('front.checkout',compact('email','zip','plandetails','delivery_day','limit','menus','delivery_dates','cart_total','coupon_name','coupon_value'));
	}
	public function delivery_dates(Request $request){
		$email=$request->email;
		$zip = $request->zip;
		$plan_id = $request->plan_id;
		$delivery_dates = Front::getActiveDeliveryDays();
		return view('front.delivery_dates',compact('email','zip','plan_id','delivery_dates'));
	}

	public function switchLang($lang)
	{
		if(array_key_exists($lang, Config::get('languages'))) {
			Session::put('applocale', $lang);
		}
		return redirect()->back();
	}
	public function postCategory(Request $request){
		$menus = Front::getMenusByCategory($request->message);
		$response = array(
			'status' => 'success',
			'subject' => view('front.ajax_layouts.menusbycat')->with(['menus' =>$menus])->render()
		);
		return response()->json($response);
	}
	public function postmenumodal(Request $request){
		$menus = Menu::getMenusAndNutritionsByMenuId($request->message);
		$response = array(
			'status' => 'success',
			'subject' => view('front.ajax_layouts.plan_menu_modal')->with(['menus' =>$menus])->render()
		);
		return response()->json($response);
	}
	public function validateZipcode(Request $request){
		$zipexist = Front::validatezip($request->message);
		$response = array(
			'status' => $zipexist
		);
		return response()->json($response);
	}
	public function ForgotPsw(){
		return view('front.forget-psw');
	}
	public function Privacy(){
		$details = Content::where('short_slug','=','priv-poli')->first();
		return view('front.privacy',compact('details'));
	}
	public function Terms(){
		$details = Content::where('short_slug','=','terms-cond')->first();
		return view('front.terms',compact('details'));
	}
	public function Faq(){
		$faqs = Faq::get();
		return view('front.faq',compact('faqs'));
	}
	public function About(){
		$details = Content::where('short_slug','=','about')->first();
		$experts = Experts::get();
		$testimonials = OrderRating::getallratings();
		return view('front.about',compact('details','experts','testimonials'));
	}
	public function Contact(){
		return view('front.contact');
	}
	public function Contactsubmit(Request $request){
		$data  = array(
			'to' => 'info@cookforme.ch',
			'from'=>$request->email,
			'msg' => $request->comments,
			'phone' => $request->comments,
			'name' => $request->name
		);
		Mail::send('front.emails.contact_layout', $data, function ($message) {
			$message->from('info@cookforme.ch', 'cookforme');
			$message->to('info@cookforme.ch');
		});
		$response =  Response::json(['success' => 'Mail send'], 201);

		if($response->original['success']=="Mail send"){
			return redirect()->back()->with('message', 'Email has been send! Someone will contact you soon...');
		}else{
			return redirect()->back()->with('message', 'Something Went wrong!');
		}
	}

	function instagrammedia(Request $request){
		$instagram = new Instagram('18518099546.1677ed0.94497557261441a6a1bec72d7a66c59f');
		$media = $instagram->media();
		if(isset($media) && !empty($media)){
			$html = '';
			if(isset($media) && !empty($media)){
				$i = 0;
				foreach ($media as $key) {
					$html .= '<li><a href="'.$key->link.'" target="_blank"><img src="'.$key->images->low_resolution->url.'"  alt="thumb"></a></li>';
					if($i == 5)
						break;
					$i++;
				}
			}
		}
		$response = array(
			'status' => $html
		);
		return response()->json($response);
		//print_r($media);

	}
	public function CustomerLogout(Request $request)
	{
       //$this->guard()->logout();
		Auth::logout();
		$request->session()->invalidate();
		return redirect('/customer-login');
	}
	public function OrderItemsmodal(Request $request){
		$items = Front::getOrderItemsById($request->message);
		$response = array(
			'subject' => view('front.ajax_layouts.order_items')->with(['items' =>$items])->render()
		);
		return response()->json($response);
	}
	public function MyProfile(){
		$users = User::where(['id'=>Auth::user()->id])->first();
		$orders = Order::where(['orders.customer_id'=>Auth::user()->id])->select('*')->orderBy('order_id', 'desc')->paginate(10);
		$reviews = Review::where('user_id','=',Auth::user()->id)->get();
		return view('front.profile',compact('users','reviews','orders'));
	}
	public function ForgotPswAction(Request $request){
		$email = $request->email;
		$id = Front::validatEmailExist($email);
		if($id){
			$data = array('link'=>'https://cookforme.ch/customer-login' );
			Mail::send('front.emails.forgotpass_layout', $data, function ($message) {
				$message->from('info@cookforme.ch', 'cookforme ForgotPassword');
				$message->to($email);
			});
			$response =  Response::json(['success' => 'Mail send'], 201);

			if($response->original['success']=="Mail send"){
				return back()->withErrors('Reset link has been sent on your email kindly check it!');
			}else{
				return back()->withErrors('Something Went wrong!');
			}
		}else{
			return back()->withErrors('Email does not exist!');
		}
		
	}
	public function ForgotPswLink(Request $request){
		dd("You will get soon this service!"); 
	}
	public function RedeemGift(){
		return view('front.gifts_redeem');
	}
	public function PurchaseGift(){
		return view('front.purchase');
	}
	public function PostComment(Request $request)
	{
		$review = new Review;
		$review->user_id = Auth::user()->id;
		$review->subject = $request->subject;
		$review->description = $request->comment;
		if($review->save()){
			return redirect()->route('my-profile')->withStatus(__('Comments successfully sent!'));
		}
	}
	public function UpdateProfile(Request $request,User $user)
	{
		try {
			$data_arr = [
				'name' => $request->name,
				'last_name' => $request->l_name,
				'first_name' => $request->f_name,
				'address_line_1' => $request->add_1,
				'address_line_2' => $request->add_2,
				'city' => $request->city,
				'state' => $request->state,
				'zip_code' => $request->zip,
				'phone' => $request->phone,
				'email' => $request->email,
			];
			$image_path = null;
			if($request->file('image')){
				$image_path = $this->ProfileImageUplaod($request);
				$data_arr['img_path'] = $image_path;
			}
			$user->where('id',Auth::user()->id)->update($data_arr);
			return redirect()->route('my-profile')->withStatus(__('Profile successfully updated.'));

		} catch (\Illuminate\Database\QueryException $e) {
			return redirect()->route('my-profile')->withStatus(__('Ooops...'.$e->errorInfo['2']));
		}
	}
	public function ProfileImageUplaod($request){
		$fileName = $request->file('image');
		$fileNameToStore = time(). '.' . $fileName->getClientOriginalExtension();
		$destinationPath = public_path('front/users/');
		$fileName->move($destinationPath, $fileNameToStore);
		return $fileNameToStore;
	}
	public function Rateorder(Request $request){
		if($request->ajax()){
			$rate = new OrderRating;
			$rate->rate_star = $request->rate_star;
			$rate->description = $request->description;
			$rate->customer_id = Auth::user()->id;
			$rate->order_id = $request->orderid;
			if($rate->save()){
				$response = array(
					'status' => 'success'
				);
			}else{
				$response = array(
					'status' => 'failed'
				);	
			}
			return response()->json($response);
		}
	}

	/**
	* Apply Coupon code
	*/
	public function ApplyCouponCode(Request $request){
		if($request->ajax()){
			$user_id = Auth::user()->id;
			$coupon_id = Front::GetCouponIdByCoupon($request);
			if($coupon_id !=null){
				$coupon_details = CouponAssign::where('user_id',$user_id)->where('coupon_id',$coupon_id->id)->first();
				if($coupon_details !=null){
					if($coupon_details->coupon_status == 'unused' && $coupon_details->coupon_expiry >=date('Y-m-d H:s:i')){
						$total = Cart::getTotal();
						$perce_amount = round($total*$coupon_id->coupon_percent/100);
						$grand_total = Front::CouponApplied($coupon_details,$coupon_id->coupon_percent);
						if($grand_total != false){
							return Response::json(['status' =>'success','message'=>'coupon applied','reduce_amount'=>number_format((float)$perce_amount, 2, '.', ''),'grand_total'=>number_format((float)$grand_total, 2, '.', '')], 201);
						}
					

					}else if($coupon_details->coupon_status == 'unused' && $coupon_details->coupon_expiry <=date('Y-m-d H:s:i')){
						return Response::json(['status' =>'false','message'=>'Coupon expire'], 201);
					}else if($coupon_details->coupon_status == 'used' && $coupon_details->coupon_expiry >=date('Y-m-d H:s:i')){
						return Response::json(['status' =>'false','message'=>'Coupon Already applied'], 201);
					}else{
						return Response::json(['status' =>'false','message'=>$coupon_details->coupon_status], 201);
					}
				}
			}else{
			 return Response::json(['status' =>'false','message'=>'Coupon Not Found.'], 201);
			}
			
		}
	}


}
