<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\CategoryTranslation;
use App\Http\Requests\CategoryStoreRequest;
use Config;

class CategoriesController extends Controller
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
    	$categories = Category::paginate(12);
        return view('admin.categories.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(CategoryStoreRequest $request)
    {
        $data = new Category;
        $data->name = $request->name_en ?? '';
        $data->description = $request->desc_en ?? '';
        if($data->save()){
            foreach(Config::get('languages') as $lang => $language){
                $name = 'name_'.$lang;
                $desc = 'desc_'.$lang;
                $cat_translation              = new CategoryTranslation;
                $cat_translation->category_id = $data->id;
                $cat_translation->locale      = $lang;
                $cat_translation->name        = $request->$name;
                $cat_translation->description = $request->$desc;
                $cat_translation->save();
            }
            return redirect()->route('category.index')->withStatus(__('Category successfully created.'));
        } 
    }
    public function edit(Category $category)
    {
       return view('admin.categories.edit',compact('category'));
   }

   public function update(CategoryStoreRequest $request, Category $category){

     $category->update([
         'name' => $request->name_en,
         'description' => $request->desc_en
     ]);

     foreach(Config::get('languages') as $lang => $language){
        $name = 'name_'.$lang;
        $desc = 'desc_'.$lang;
        $cat_translation              = CategoryTranslation::where('locale',$lang)->where('category_id',$category->id)->first();
        if(!$cat_translation){
            $cat_translation              = new CategoryTranslation;
        }
        $cat_translation->category_id = $category->id;
        $cat_translation->locale      = $lang;
        $cat_translation->name        = $request->has($name)?$request->$name:'';
        $cat_translation->description = $request->has($desc)?$request->$desc:'';
        $cat_translation->save();
    }
    return redirect()->route('category.index')->withStatus(__('Category successfully updated.'));
}
public function destroy(Category $category)
{
    $category->delete();

    return redirect()->route('category.index')->withStatus(__('Category successfully deleted.'));
}

}
