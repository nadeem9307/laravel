<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Menu;
use App\Model\Category;
use App\Model\Ingredents;
use App\Http\Requests\MenusRequest;
use App\Model\MenuTranslation;
use Image;
use Illuminate\Support\Str;
use File;
use Config;

class MenusController extends Controller
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
      $menus = Menu::getAllMenus();
        return view('admin.menus.index',compact('menus'));
    }
    public function create()
    {
      $ingredents = Ingredents::where('status','active')->get();
    	$category = Category::where('status','active')->get();
        return view('admin.menus.create',compact('category','ingredents'));
    }
    public function store(MenusRequest $request)
    {
      $menu = new Menu;
      $image_path = $this->MenuImageUplaod($request);
    	$menu->category_id = $request->category ?? '';
      $menu->menu_name = $request->menu_name_en ?? '';
      $menu->sort_description = $request->sort_description_en ?? '';
    	$menu->menu_description = $request->menu_description_en ?? '';
      $menu->menu_type = $request->menu_type ?? '';
      $menu->menu_size = $request->menu_size ?? '';
      $menu->ingredent_id = json_encode($request->ingredent_id);
      $menu->features = $request->features_en ?? '';
      $menu->price = $request->price ?? '';
      $menu->menu_thumb = json_encode($image_path['fileName']);
    	if($menu->save()){

          foreach(Config::get('languages') as $lang => $language){
          $name    = 'menu_name_'.$lang;
          $sort    = 'sort_description_'.$lang;
          $desc    = 'menu_description_'.$lang;
          $feature = 'features_'.$lang;

          $menu_translation                   = new MenuTranslation;
          $menu_translation->menu_id          = $menu->id;
          $menu_translation->locale           = $lang;
          $menu_translation->menu_name        = $request->has($name)?$request->$name:'';
          $menu_translation->sort_description = $request->has($sort)?$request->$sort:'';
          $menu_translation->menu_description = $request->has($desc)?$request->$desc:'';
          $menu_translation->features         = $request->has($feature)?$request->$feature:'';
          $menu_translation->save();
        }
            return redirect()->route('menus.index')->withStatus(__('Menu successfully created.'));
    	} 
    }
    public function edit(Menu $menu)
    {
        $ingredents = Ingredents::where('status','active')->get();
        $category = Category::where('status','active')->get();
        
         return view('admin.menus.edit',compact('menu','category','ingredents'));
    }

   public function update(MenusRequest $request, Menu $menu){
      $menuid = $request->id;
      $image_path ='';
      if(is_array($request->menu_thumb)){
          $image = $this->MenuImageUplaod($request);
          $image_path = $image['fileName'];
           if($menu->menu_thumb !='[]'){
            $image_path =  array_merge(json_decode($menu->menu_thumb,true),$image_path);
          }
        }else{
          $image_path = json_decode($menu->menu_thumb,true);
        }
       // dd($menu);
       $menu->update([
           'category_id' => $request->category,
           'menu_name' => $request->menu_name_en,
           'sort_description' => $request->sort_description_en,
           'menu_description' => $request->menu_description_en,
           'menu_type' => $request->menu_type,
           'menu_size' => $request->menu_size,
           'ingredent_id' => json_encode($request->ingredent_id),
           'features' => $request->features_en,
           'price' => $request->price,
           'menu_thumb' => json_encode($image_path)
        ]);
       //dd($request->all());
       foreach(Config::get('languages') as $lang => $language){
          $name = 'menu_name_'.$lang;
          $sort_desc = 'sort_description_'.$lang;
          $menu_desc = 'menu_description_'.$lang;
          $feature = 'features_'.$lang;
          $menuTranslation              = MenuTranslation::where('locale',$lang)->where('menu_id',$menuid)->first();
          if(!$menuTranslation){
            $menuTranslation              = new MenuTranslation;
          }
          $menuTranslation->menu_id = $menuid;
          $menuTranslation->locale = $lang;
          $menuTranslation->menu_name = $request->has($name)?$request->$name:'';
          $menuTranslation->sort_description = $request->has($sort_desc)?$request->$sort_desc:'';
          $menuTranslation->menu_description = $request->has($menu_desc)?$request->$menu_desc:'';
          $menuTranslation->features = $request->has($feature)?$request->$feature:'';
          $menuTranslation->save();
       }
        return redirect()->route('menus.index')->withStatus(__('Menu successfully updated.'));
    }
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->withStatus(__('Menu successfully deleted.'));
    }
   public function MenuImageUplaod($request){
      $fileName = array();
      foreach($request->file('menu_thumb') as $key => $value) {
          $fileNameToStore = time(). $key . '.' . $value->getClientOriginalExtension();
          $destinationPath = public_path('uploads/menus/');
          $value->move($destinationPath, $fileNameToStore);
          $fileName[] = $fileNameToStore;
        }
        return compact('fileName');
    }

    /*********** remove menu image*************/
    public function RemoveImageIndex(Request $request){
      if($request->ajax()){
        $menu = Menu::find($request->id);
        if(!empty($menu)){
          $images = json_decode($menu->menu_thumb,true);
          $pos = array_search($request->img, $images);
          unset($images[$pos]);
            if($menu) {
                  $menu->menu_thumb = json_encode($images);
                  $menu->save();
                  $image_path = public_path('uploads/menus/'.$request->img);
                  if(File::exists($image_path)) {
                      File::delete($image_path);
                      echo "Image removed successfully";
                  }
              }
          }
      }
    }
}
