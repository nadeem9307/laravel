<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Model\CouponAdd;
use App\Model\CouponAssign;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Response;
use Mail;

class CouponAssigningController extends Controller
{
    
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
    	$user_list = CouponAssign::GetAllAssignedCoupon();

        return view('admin.coupon_assiging_user.index',compact('user_list'));
    }
  

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $assign_coupon_to_user)
    {
    	$assigned_coupon = CouponAssign::where('user_id',$assign_coupon_to_user->id)->select('coupon_id')->first();
    	$coupons = CouponAdd::where('coupon_status','active')->where('coupon_end_date','>=',date('Y-m-d H:s:i'))->orderBy('id','desc')->get();
        return view('admin.coupon_assiging_user.edit', compact('assigned_coupon','assign_coupon_to_user','coupons'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $assign_coupon_to_user)
    {
    	// dd($assign_coupon_to_user->id);
    	$check = CouponAssign::where('user_id',$assign_coupon_to_user->id)
    	->where(function($query) {
                return $query->where('coupon_expiry','>=',date('Y-m-d'))
                    ->Where('coupon_status','unused');
            })->first();
           
            $exist = CouponAssign::where('user_id',$assign_coupon_to_user->id)->first();
    	if ($check == null) {
			   $coupon_assign = new CouponAssign();
		    	$coupon_assign->coupon_id=$request->coupon_id;
		    	$coupon_assign->user_id=$assign_coupon_to_user->id;
		    	$coupon_assign->coupon_expiry=$request->coupon_expiry;
		    	if($coupon_assign->save()){
		    		return redirect()->route('assign-coupon-to-user.index')->withStatus(__('Coupon successfully Assigned.'));
		    	}
			}else if($exist !=null){
				$exist->coupon_id=$request->coupon_id;
		    	$exist->user_id=$assign_coupon_to_user->id;
		    	$exist->coupon_expiry=$request->coupon_expiry;
		    	if($exist->save()){
		    		return redirect()->route('assign-coupon-to-user.index')->withStatus(__('Coupon successfully Updated.'));
		    	}

			}else{
				return redirect()->route('assign-coupon-to-user.index')->withStatus(__('Coupon  Already Assigned.'));
			}
    	
        
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if ($user->id == 1) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }


    /**
    *Get coupon expiry by coupon id
    */
    public function GetCouponExpiry(Request $request){
    	if($request->ajax()){
    		$coupon_expiry = CouponAdd::where('id',$request->id)->select('coupon_end_date')->first();
    		return Response::json(array('success'=>true,'coupon_expiry'=>$coupon_expiry));
    	}

    }

    /**
    * Send Coupon on users
    */
    public function SendEmailCoupon(Request $request){
        if($request->ajax()){
            $data = CouponAssign::GetUserAssignedCoupon($request);
           foreach($data as $key => $users){
            Mail::send('front.emails.discountCoupon', $users, function ($message) use ($users) {
                $message->from('info@cookforme.ch', 'cookforme');
                $message->to($users['email']);
                $message->cc('info@cookforme.ch');
                $message->subject('Discount Coupon');
            });
           }
           return Response::json(['success' =>'true','message'=>'Mail send'], 201);
        }

    }
}
