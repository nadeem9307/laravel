<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PlanRequest extends FormRequest
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
        'plan_name'            =>  'required|string|max:50|regex:/(^[A-Za-z0-9 ]+$)+/|unique:plans,id,'.$request->id,
            'plan_description'     =>  'required',
            'plan_meal_limit'      =>  'required|numeric',
            'plan_meal_type'       =>  'required',
            'plan_per_meal_price'  =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'plan_price'           =>  'required|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }
    
}
