<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ingredents;
use App\Model\IngredentTranslation;
use App\Http\Requests\IngredentsRequest;
use Image;
use Config;

class IngredentController extends Controller
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
    	$ingredents = Ingredents::paginate(12);
      return view('admin.ingredents.index',compact('ingredents'));
    }
    public function create()
    {
      return view('admin.ingredents.create');
    }
    public function store(IngredentsRequest $request,Ingredents $ingredents)
    {
    	$image_path = $this->ImageUplaod($request);
    	$ingredents->name=$request->name_en ?? '';
    	$ingredents->description=$request->description_en ?? '';
    	$ingredents->thumb=$image_path ?? ' ';
    	if($ingredents->save()){

        foreach(Config::get('languages') as $lang => $language){
          $name = 'name_'.$lang;
          $desc = 'description_'.$lang;
          $ing_translation              = new IngredentTranslation;
          $ing_translation->ingredent_id = $ingredents->id;
          $ing_translation->locale      = $lang;
          $ing_translation->name        = $request->has($name)?$request->$name:'';
          $ing_translation->description = $request->has($desc)?$request->$desc:'';
          $ing_translation->save();
        }
        return redirect()->route('ingredents.index')->withStatus(__('Ingredent successfully created.'));
      } 
    }
    public function edit(Ingredents $ingredents,$id)
    {
    	$ingredents = Ingredents::find($id);
     return view('admin.ingredents.edit',compact('ingredents'));
   }

   public function update(IngredentsRequest $request, Ingredents $ingredents){
     $ingredent = Ingredents::find($request->id)->toArray();
   
     $image_path = '';

     if(in_array($request->thumb, $ingredent)){
       $image_path = $request->thumb;
     }else{
       $image_path = $this->ImageUplaod($request);
     }
     $ingredents->where('id',$request->id)->update([
       'name' => $request->name_en,
       'description' => $request->description_en,
       'thumb' => $image_path ?? 'fdf'
     ]);
     foreach(Config::get('languages') as $lang => $language){
        $name = 'name_'.$lang;
        $desc = 'description_'.$lang;
        $ing_translation              = IngredentTranslation::where('locale',$lang)->where('ingredent_id',$ingredent['id'])->first();
        if(!$ing_translation){
            $ing_translation              = new IngredentTranslation;
          }
        $ing_translation->ingredent_id = $ingredent['id'];
        $ing_translation->locale      = $lang;
        $ing_translation->name        = $request->has($name)?$request->$name:'';
        $ing_translation->description = $request->has($desc)?$request->$desc:'';
        $ing_translation->save();
      }
     return redirect()->route('ingredents.index')->withStatus(__('Ingredent successfully updated.'));
   }
   public function destroy(Ingredents $ingredents)
   {
    $ingredents->delete();

    return redirect()->route('ingredents.index')->withStatus(__('Ingredent successfully deleted.'));
  }

  public function ImageUplaod($request){
   if($request->thumb) {
    $filenameWithExt = $request->thumb->getClientOriginalName();
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $extension = $request->file('thumb')->getClientOriginalExtension();
    $fileNameToStore = $filename.'_'.time().'.'.$extension;
    $destinationPath = public_path('uploads/ingredents/');
    if($request->file('thumb')->move($destinationPath, $fileNameToStore)){
      return $fileNameToStore;

    }
  }
}

}
