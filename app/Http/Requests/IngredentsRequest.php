<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class IngredentsRequest extends FormRequest
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
        if($request->id == ''){
            return [
                'name_en'              =>  'required',
                'description_en'      =>  'required',
                'thumb'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ];
        }else{
            return [
                'name_en'              =>  'required',
                'description_en'      =>  'required',
              //  'thumb'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ];
        }
    }
}
