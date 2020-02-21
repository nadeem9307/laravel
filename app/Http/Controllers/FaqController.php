<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Faq;
use Config;
use App\Http\Requests\FaqRequest;
use App\Model\FaqTranslation;

class FaqController extends Controller
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
         $faqs = Faq::paginate(12);
        return view('admin.faqs.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faq $faq)
    {
       // dd($request->all());
        $faq->title = $request->title_en ?? '';
        $faq->description = $request->desc_en ?? '';
        try {
        if($faq->save()){
         foreach(Config::get('languages') as $lang => $language){
            $title = 'title_'.$lang;
            $description = 'desc_'.$lang;
            $faq_translation                   = new FaqTranslation;
            $faq_translation->faq_id = $faq->id;
            $faq_translation->locale = $lang;
            $faq_translation->title = $request->has($title)?$request->$title:'';
            $faq_translation->description = $request->has($description)?$request->$description:'';
            $faq_translation->save();
        }
        return redirect()->route('faqs.index')->withStatus(__('Faq successfully created.'));
    } 
} catch (\Illuminate\Database\QueryException $e) {
        //dd($e->errorInfo['2'])
    return redirect()->route('faqs.index')->withStatus(__('Ooops...Duplicate entry is not possible kindly update this page!'));
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
    public function edit(Faq $faq)
    {
         return view('admin.faqs.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $faqid = $request->id;
        $faq->update([
           'title' => $request->title_en,
           'description' => $request->desc_en,
        ]);
        foreach(Config::get('languages') as $lang => $language){
        $title = 'title_'.$lang;
        $description = 'desc_'.$lang;
        $faq_translation  =  FaqTranslation::where('locale',$lang)->where('faq_id',$faqid)->first();
        if(!$faq_translation){
            $faq_translation  = new FaqTranslation;
        }
        $faq_translation->faq_id = $faqid;
        $faq_translation->locale = $lang;
        $faq_translation->title = $request->has($title)?$request->$title:'';
        $faq_translation->description = $request->has($description)?$request->$description:'';
        $faq_translation->save();
    }
    return redirect()->route('faqs.index')->withStatus(__('Faq successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->withStatus(__('Faq successfully deleted.'));
    }
}
