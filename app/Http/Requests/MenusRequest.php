<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class MenusRequest extends FormRequest
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
        
        if($request->id != '' && !isset($request->menu_thumb)){
             return [
        'category'      =>  'required',
        'menu_name_en'        =>  'required|string|max:50|unique:menus,id,'.$request->id,
        'sort_description_en' =>  'required',
        'menu_description_en' =>  'required',
        'menu_type'        =>  'required',
        'menu_size'        =>  'required',
        'ingredent_id'     =>  'required',
        'features_en'         =>  'required',
        'price'         =>  'required|regex:/^\d+(\.\d{1,2})?$/'
            
        ];
        }else{
            //dd($request->all());
             return [
        'category'      =>  'required',
        'menu_name_en'        =>  'required|string|max:50',
        'sort_description_en' =>  'required',
        'menu_description_en' =>  'required',
        'menu_type'        =>  'required',
        'menu_size'        =>  'required',
        'ingredent_id'     =>  'required',
        'features_en'         =>  'required',
        'price'         =>  'required|regex:/^\d+(\.\d{1,2})?$/',
        'menu_thumb'=> 'required',
        // 'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ];
        }
      
    }
}
