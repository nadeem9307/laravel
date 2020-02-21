<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Menu;
use App\Model\NutricianFacts;
use App\Http\Requests\NutricianFactsRequest;
use Config;
use App\Model\NutricianFactsTranslation;

class NutricianFactsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
      $this->middleware('auth');
    }

    public function index()
    {
      $nutricians = NutricianFacts::paginate(12);
      return view('admin.nutricians.index',compact('nutricians'));
    }
    public function create()
    {
    	$menus = Menu::where('status','active')->get();
      return view('admin.nutricians.create',compact('menus'));
    }
    public function store(NutricianFactsRequest $request, NutricianFacts $nutricianfacts)
    {
      //dd($request->all());
    	$nutricianfacts->menu_id = $request->menu_id ?? '';
      $nutricianfacts->description = $request->description_en ?? '';
      $nutricianfacts->nutrition_facts = json_encode(array_combine($request->nutrition_facts_key_en, $request->nutrition_facts_val_en)) ?? '';
      $nutricianfacts->serving_size = $request->serving_size ?? '';
      $nutricianfacts->calories = $request->calories ?? '';
      $nutricianfacts->carbs = $request->carbs ?? '';
      $nutricianfacts->fat = $request->fat ?? '';
      $nutricianfacts->protein = $request->protein ?? '';
      $nutricianfacts->information = $request->information_en ?? '';
      if($nutricianfacts->save()){
        foreach(Config::get('languages') as $lang => $language){
          $description    = 'description_'.$lang;
          $information    = 'information_'.$lang;
          $nutrition_facts_key = 'nutrition_facts_key_'.$lang;
          $nutrition_facts_val = 'nutrition_facts_val_'.$lang;
          $nutricianfactstranslation                   = new NutricianFactsTranslation;
          $nutricianfactstranslation->locale = $lang;
          $nutricianfactstranslation->description = $request->has($description)?$request->$description:'';
          $nutricianfactstranslation->information = $request->has($information)?$request->$information:'';
          $nutricianfactstranslation->nutrician_fact_id = $nutricianfacts->id;
          $nutricianfactstranslation->nutrition_facts = json_encode(array_combine($request->$nutrition_facts_key, $request->$nutrition_facts_val)) ?? '';
          $nutricianfactstranslation->save();
        }

        return redirect()->route('nutricians.index')->withStatus(__('Nutrician Facts successfully created.'));
      }else{
        return redirect()->route('nutricians.create')->withStatus(__('Nutrician Facts not created.'));
      } 
    }
    public function edit(NutricianFacts $nutrician)
    {
      //dd($nutrician->translation('fr')->first());
      $menus = Menu::where('status','active')->get();
      return view('admin.nutricians.edit',compact('menus','nutrician'));
    }

    public function update(NutricianFactsRequest $request, NutricianFacts $nutrician){
     $nutrician->update([
       'menu_id' => $request->menu_id,
       'description' => $request->description_en,
       'nutrition_facts' => json_encode(array_combine($request->nutrition_facts_key_en, $request->nutrition_facts_val_en)),
       'serving_size' => $request->serving_size,
       'calories' => $request->calories,
       'carbs' => $request->carbs,
       'fat' => $request->fat,
       'protein' => $request->protein,
       'information' => $request->information_en
     ]);
     foreach(Config::get('languages') as $lang => $language){
      $description    = 'description_'.$lang;
      $information    = 'information_'.$lang;
      $nutrition_facts_key = 'nutrition_facts_key_'.$lang;
      $nutrition_facts_val = 'nutrition_facts_val_'.$lang;
      $nutricianfactstranslation              = NutricianFactsTranslation::where('locale',$lang)->where('nutrician_fact_id',$nutrician['id'])->first();
      if(!$nutricianfactstranslation){
        $nutricianfactstranslation              = new NutricianFactsTranslation;
      }
      $nutricianfactstranslation->nutrician_fact_id = $nutrician['id'];
      $nutricianfactstranslation->locale = $lang;
      $nutricianfactstranslation->description = $request->has($description)?$request->$description:'';
      $nutricianfactstranslation->information = $request->has($information)?$request->$information:'';
      $nutricianfactstranslation->nutrition_facts = json_encode(array_combine($request->$nutrition_facts_key, $request->$nutrition_facts_val)) ?? '';
      $nutricianfactstranslation->save();
    }
      return redirect()->route('nutricians.index')->withStatus(__('Nutrician Facts successfully updated.'));
    }
    public function destroy(NutricianFacts $nutrician)
    {
      $nutrician->delete();

      return redirect()->route('nutricians.index')->withStatus(__('Nutrician Facts successfully deleted.'));
    }
  }
