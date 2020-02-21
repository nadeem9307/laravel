<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Content;
use App\Http\Requests\ContentRequest;
use App\Model\ContentTranslation;
use Image;
use Illuminate\Support\Str;
use File;
use Config;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $contents = Content::paginate(12);
       // dd($contents);
        return view('admin.contents.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.contents.create');
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request, Content $content)
    {
       $json_img = '';
       $short_slug = '';
       if(is_array($request->content_thumb)){
        $image_path = $this->ContentImageUplaod($request);
        $json_img = json_encode($image_path['fileName']);
    }
    $content->title = $request->title_en ?? '';
    $content->sub_title = $request->sub_title_en ?? '';
    $content->description = $request->desc_en ?? '';
    $content->content_thumb =  $json_img;
    $content->short_slug =  $request->short_slug ?? '';
    try {
        if($content->save()){
               foreach(Config::get('languages') as $lang => $language){
                $title = 'title_'.$lang;
                $sub_title = 'sub_title_'.$lang;
                $description = 'desc_'.$lang;
                $content_translation                   = new ContentTranslation;
                $content_translation->content_id = $content->id;
                $content_translation->locale = $lang;
                $content_translation->title = $request->has($title)?$request->$title:'';
                $content_translation->sub_title = $request->has($sub_title)?$request->$sub_title:'';
                $content_translation->description = $request->has($description)?$request->$description:'';
                $content_translation->save();
            }
            return redirect()->route('contents.index')->withStatus(__('Content Slot successfully created.'));
        } 
    } catch (\Illuminate\Database\QueryException $e) {
        //dd($e->errorInfo['2'])
        return redirect()->route('contents.index')->withStatus(__('Ooops...Duplicate entry is not possible kindly update this page!'));
}
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
       return view('admin.contents.edit',compact('content'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, Content $content)
    {
        $contentid = $request->id;
        if(is_array($request->content_thumb)){
          $image = $this->ContentImageUplaod($request);
          $image_path = $image['fileName'];
          if($content->content_thumb !='[]'){
            $image_path =  array_merge(json_decode($content->content_thumb,true),$image_path);
        }
    }else{
        $image_path = json_decode($content->content_thumb,true);
    }
    //dd($request->status);
    $content->update([
     'short_slug' => $request->short_slug,
     'title' => $request->title_en,
     'sub_title' => $request->sub_title_en,
     'description' => $request->desc_en,
     'content_thumb' => json_encode($image_path),
     'status' => $request->status
 ]);
    foreach(Config::get('languages') as $lang => $language){
        $title = 'title_'.$lang;
        $sub_title = 'sub_title_'.$lang;
        $description = 'desc_'.$lang;
        $content_translation  =  ContentTranslation::where('locale',$lang)->where('content_id',$contentid)->first();
        if(!$content_translation){
            $content_translation  = new ContentTranslation;
        }
        $content_translation->content_id = $contentid;
        $content_translation->locale = $lang;
        $content_translation->title = $request->has($title)?$request->$title:'';
        $content_translation->sub_title = $request->has($sub_title)?$request->$sub_title:'';
        $content_translation->description = $request->has($description)?$request->$description:'';
        $content_translation->save();
    }
    return redirect()->route('contents.index')->withStatus(__('Content successfully updated.'));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('contents.index')->withStatus(__('Content successfully deleted.'));
    }

    public function ContentImageUplaod($request){
       //dd($request->file());
      $fileName = array();
      foreach($request->file('content_thumb') as $key => $value) {
          $fileNameToStore = time(). $key . '.' . $value->getClientOriginalExtension();
          $destinationPath = public_path('uploads/contents/');
          $value->move($destinationPath, $fileNameToStore);
          $fileName[] = $fileNameToStore;
      }
      return compact('fileName');
  }
   public function RemoveImageIndex(Request $request){
      if($request->ajax()){
        $content = Content::find($request->id);
        if(!empty($content)){
          $images = json_decode($content->content_thumb,true);
          $pos = array_search($request->img, $images);
          unset($images[$pos]);
            if($content) {
                  $content->content_thumb = json_encode($images);
                  $content->save();
                  $image_path = public_path('uploads/contents/'.$request->img);
                  if(File::exists($image_path)) {
                      File::delete($image_path);
                      echo "Image removed successfully";
                  }
              }
          }
      }
    }
}
