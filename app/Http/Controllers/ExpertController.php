<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Experts;
use App\Http\Requests\ExpertRequest;
use File;

class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $experts = Experts::paginate(12);
      return view('admin.experts.index',compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.experts.create');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $expert = new Experts;
      $image_path = null;
      if($request->file('expert_thumb')){
        $image_path = $this->ExpertImageUplaod($request);
      }
      $expert->name = $request->name ?? '';
      $expert->designation = $request->desg ?? '';
      $expert->description = $request->desc ?? '';
      $expert->twitter_links = $request->twitter ?? NULL;
      $expert->fb_links = $request->facebook ?? NULL;
      $expert->pinterest_links = $request->pinterest ?? NULL;
      $expert->linkedin_links = $request->linkedin ?? NULL;
      $expert->img_path = $image_path;
      if($expert->save()){
       return redirect()->route('experts.index')->withStatus(__('Expert successfully added.'));
     }
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Experts $expert)
    {
      return view('admin.experts.edit',compact('expert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experts $expert)
    {
      $image_path = null;
      if($request->file('expert_thumb')){
        $image_path = $this->ExpertImageUplaod($request);
      }
      $expert->id = $request->id;
      $expert->name = $request->name ?? '';
      $expert->designation = $request->desg ?? '';
      $expert->description = $request->desc ?? '';
      $expert->twitter_links = $request->twitter ?? NULL;
      $expert->fb_links = $request->facebook ?? NULL;
      $expert->pinterest_links = $request->pinterest ?? NULL;
      $expert->linkedin_links = $request->linkedin ?? NULL;
      $expert->img_path = $image_path;
      if($expert->update()){
       return redirect()->route('experts.index')->withStatus(__('Expert successfully updated.'));
     }
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ExpertImageUplaod($request){
      $fileName = $request->file('expert_thumb');
      $fileNameToStore = time(). '.' . $fileName->getClientOriginalExtension();
      $destinationPath = public_path('uploads/experts/');
      $fileName->move($destinationPath, $fileNameToStore);
      return $fileNameToStore;
    }
    public function RemoveImageIndex(Request $request){
      if($request->ajax()){
        $expert = Experts::find($request->id);
        if(!empty($expert)){
          $img_path = $expert->img_path;
          if($expert) {
            $expert->img_path = null;
            $expert->save();
            $image_path = public_path('uploads/experts/'.$request->img);
            if(File::exists($image_path)) {
              File::delete($image_path);
              echo "Image removed successfully";
            }
          }
        }
      }
    }
  }
