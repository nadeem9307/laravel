<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CouponAdd;
use App\Http\Requests\AddCouponRequest;

class CouponAddController extends Controller
{
    public function index()
    {
    	$addcoupon = CouponAdd::orderBy('id','desc')->paginate(12);
        return view('admin.addcoupons.index',compact('addcoupon'));
    }

     public function create()
    {
        return view('admin.addcoupons.create');
    }
    public function store(AddCouponRequest $request, CouponAdd $couponAdd)
    { 
    	$couponAdd->coupon_code = strtoupper($request->coupon_code);
    	$couponAdd->coupon_percent = $request->coupon_percent;
    	$couponAdd->coupon_end_date = date('Y-m-d H:i:s',strtotime($request->coupon_end_date));
    	$couponAdd->coupon_status = $request->coupon_status;
    	if($couponAdd->save()){
            return redirect()->route('addcoupon.index')->withStatus(__('Coupon successfully created.'));
    	} 
    }

    public function edit(CouponAdd $addcoupon)
    {
       return view('admin.addcoupons.edit',compact('addcoupon'));
   }

   public function update(AddCouponRequest $request, CouponAdd $addcoupon){

     $addcoupon->update([
         'coupon_code' => strtoupper($request->coupon_code),
         'coupon_percent' => $request->coupon_percent,
         'coupon_end_date' => date('Y-m-d H:i:s',strtotime($request->coupon_end_date)),
         'coupon_status' => $request->coupon_status
     ]);

    //  foreach(Config::get('languages') as $lang => $language){
    //     $name = 'name_'.$lang;
    //     $desc = 'desc_'.$lang;
    //     $cat_translation              = CategoryTranslation::where('locale',$lang)->where('category_id',$category->id)->first();
    //     if(!$cat_translation){
    //         $cat_translation              = new CategoryTranslation;
    //     }
    //     $cat_translation->category_id = $category->id;
    //     $cat_translation->locale      = $lang;
    //     $cat_translation->name        = $request->has($name)?$request->$name:'';
    //     $cat_translation->description = $request->has($desc)?$request->$desc:'';
    //     $cat_translation->save();
    // }
    return redirect()->route('addcoupon.index')->withStatus(__('Coupon successfully updated.'));
}
public function destroy(CouponAdd $addcoupon)
{
    $addcoupon->delete();

    return redirect()->route('addcoupon.index')->withStatus(__('Coupon successfully deleted.'));
}
}
