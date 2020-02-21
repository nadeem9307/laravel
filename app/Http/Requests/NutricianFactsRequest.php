<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class NutricianFactsRequest extends FormRequest
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
        //dd($request->all());
       return [
        'menu_id'      =>  'required',
        'description_en' =>  'required',
        'information_en' =>  'required',
        // 'nutrition_facts' =>  'required',
        'serving_size'   =>  'required',
        'calories'       =>  'required',
        'carbs'      =>  'required',
        'protein'    =>  'required',
        'fat'        =>  'required'
        
        ];
    }
}
