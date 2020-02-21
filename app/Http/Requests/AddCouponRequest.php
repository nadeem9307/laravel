<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if(isset($request->id)){
   
             return [
        'coupon_code'      =>  'required|max:50|unique:coupon_adds,id,'.$request->id,
        'coupon_percent'        =>  'required',
        'coupon_end_date' =>  'required',
        'coupon_status' =>  'required'
            
        ];
        }else{
             return [
        'coupon_code'      =>  'required|max:50|unique:coupon_adds',
        'coupon_percent'        =>  'required',
        'coupon_end_date' =>  'required|',
        'coupon_status'=>'required'
        ];
        }
      
    }
}
