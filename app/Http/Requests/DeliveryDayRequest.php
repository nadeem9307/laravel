<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class DeliveryDayRequest extends FormRequest
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

        return [
        'order_day_check'            =>  'required|string|unique:delivery_days,id,'.$request->id,
        'order_before_time'     =>  'required',
        'delivery_day'            =>  'required|string|unique:delivery_days,id,'.$request->id
        
        ];
    }
}
