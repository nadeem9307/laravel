@extends('layouts.app', ['page' => __('Content Management'), 'pageSlug' => 'contents'])
@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Content Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('contents.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('contents.update', $content) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <h6 class="heading-small text-muted mb-4">{{ __('Content information') }}</h6>
                        <div class="pl-lg-4">
                            <input type="hidden" name="id" value="{{$content->id}}">
                                <div class="form-group{{ $errors->has('short_slug') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-menu">{{ __('Page Name') }}</label>
                                <select class="form-control select_custom" title="Single Select" tabindex="-98" name="short_slug">
                                    <option >Select Page</option>
                                    @foreach(config('pages') as $key => $value)
                                    <option value="{{$key}}" {{$content->short_slug==$key?'selected':''}}>{{$value}}</option>
                                    @endforeach
                                    @include('alerts.feedback', ['field' => 'short_slug'])
                                </select>
                            </div>

                            <div class="form-group{{ $errors->has('title_en') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="title_en">{{ __('Title(EN)') }}</label>
                                <input type="text" name="title_en" id="title_en" class="form-control form-control-alternative{{ $errors->has('title_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Title(EN)') }}" value="{{ $content->translation('en')->first()?$content->translation('en')->first()->title:'' }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'title_en'])
                            </div>
                            <div class="form-group{{ $errors->has('title_fr') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="title_fr">{{ __('Title(FR)') }}</label>
                                <input type="text" name="title_fr" id="title_fr" class="form-control form-control-alternative{{ $errors->has('title_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Title(FR)') }}" value="{{ $content->translation('fr')->first()?$content->translation('fr')->first()->title:'' }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'title_fr'])
                            </div>
                            <div class="form-group{{ $errors->has('title_it') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="title_it">{{ __('Title(IT)') }}</label>
                                <input type="text" name="title_it" id="title_it" class="form-control form-control-alternative{{ $errors->has('title_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Title(IT)') }}" value="{{ $content->translation('it')->first()?$content->translation('it')->first()->title:'' }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'title_it'])
                            </div>
                            <div class="form-group{{ $errors->has('title_de') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="title_de">{{ __('Title(DE)') }}</label>
                                <input type="text" name="title_de" id="title_de" class="form-control form-control-alternative{{ $errors->has('title_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Title(DE)') }}" value="{{ $content->translation('de')->first()?$content->translation('de')->first()->title:'' }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'title_de'])
                            </div>
                            <div class="form-group{{ $errors->has('sub_title_en') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="sub_title_en">{{ __('Sub Title(EN)') }}</label>
                                    <input type="text" name="sub_title_en" id="sub_title_en" class="form-control form-control-alternative{{ $errors->has('sub_title_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Title(EN)') }}" value="{{ $content->translation('en')->first()?$content->translation('en')->first()->sub_title:'' }}"  autofocus>
                                    @include('alerts.feedback', ['field' => 'sub_title_en'])
                                </div>
                                <div class="form-group{{ $errors->has('sub_title_fr') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="sub_title_fr">{{ __('Sub Title(FR)') }}</label>
                                    <input type="text" name="sub_title_fr" id="sub_title_fr" class="form-control form-control-alternative{{ $errors->has('sub_title_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Title(FR)') }}" value="{{ $content->translation('fr')->first()?$content->translation('fr')->first()->sub_title:'' }}"  autofocus>
                                    @include('alerts.feedback', ['field' => 'sub_title_fr'])
                                </div>
                                <div class="form-group{{ $errors->has('sub_title_it') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="sub_title_it">{{ __('Sub Title(IT)') }}</label>
                                    <input type="text" name="sub_title_it" id="sub_title_it" class="form-control form-control-alternative{{ $errors->has('sub_title_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Title(IT)') }}" value="{{ $content->translation('it')->first()?$content->translation('it')->first()->sub_title:'' }}"  autofocus>
                                    @include('alerts.feedback', ['field' => 'sub_title_it'])
                                </div>
                                <div class="form-group{{ $errors->has('sub_title_de') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="sub_title_de">{{ __('Sub Title(DE)') }}</label>
                                    <input type="text" name="sub_title_de" id="sub_title_de" class="form-control form-control-alternative{{ $errors->has('sub_title_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Title(DE)') }}" value="{{ $content->translation('de')->first()?$content->translation('de')->first()->sub_title:'' }}"  autofocus>
                                    @include('alerts.feedback', ['field' => 'sub_title_de'])
                                </div>
                            <div class="form-group{{ $errors->has('desc_en') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_en">{{ __('Description(EN)') }}</label>
                                <textarea rows="3" cols="50" name="desc_en" id="desc_en" class="form-control form-control-alternative ckeditor{{ $errors->has('description_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description EN') }}" value="" required>{{ $content->translation('en')->first()?$content->translation('en')->first()->description:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'desc_en'])
                            </div>
                            <div class="form-group{{ $errors->has('desc_fr') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_fr">{{ __('Description(FR)') }}</label>
                                <textarea rows="3" cols="50" name="desc_fr" id="desc_fr" class="form-control form-control-alternative ckeditor{{ $errors->has('desc_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description FR') }}" value="" required>{{ $content->translation('fr')->first()?$content->translation('fr')->first()->description:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'desc_fr'])
                            </div>
                             <div class="form-group{{ $errors->has('desc_it') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_it">{{ __('Description(IT)') }}</label>
                                <textarea rows="3" cols="50" name="desc_it" id="desc_it" class="form-control form-control-alternative ckeditor{{ $errors->has('desc_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description IT') }}" value="" required>{{ $content->translation('it')->first()?$content->translation('it')->first()->description:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'desc_it'])
                            </div>
                            <div class="form-group{{ $errors->has('desc_de') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_de">{{ __('Description(DE)') }}</label>
                                <textarea rows="3" cols="50" name="desc_de" id="desc_de" class="form-control form-control-alternative ckeditor{{ $errors->has('desc_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description DE') }}" value="" required>{{ $content->translation('de')->first()?$content->translation('de')->first()->description:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'desc_de'])
                            </div>
                            <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-menu">{{ __('Page Status') }}</label>
                                    <select class="form-control select_custom" title="Single Select" tabindex="-98" name="status">
                                    <option value="active" {{$content->page_id=='1'?'selected':''}}>Active</option>
                                    <option value="inactive" {{$content->status=='inactive'?'selected':''}}>In-Active</option>
                                    @include('alerts.feedback', ['field' => 'status'])
                                    </select>
                                </div>
                            <div class="form-groups{{ $errors->has('content_thumb') ? ' has-danger' : '' }}">
                                     <label class="form-control-label" for="input-features">{{ __('Upload Multiple Images') }}</label>
                                      <div class="col-md-12 col-sm-12">
                                      <input type="file" class="mb-4"  id="content_thumb" name="content_thumb[]" value="{{ $content->content_thumb}}" multiple/>
                                      <div class="row"> 
                                      @if(isset($content->content_thumb) && (!empty($content->content_thumb)))
                                      @foreach(json_decode($content->content_thumb,true) as $key => $img)
                                      <div class="col-md-3 col-sm-3 mb-4 parent_image" >
                                        <div style="position: relative;">
                                            <img src="{{asset('public/uploads/contents/'.$img)}}">
                                            <div class="image_remove"><a href="javascript:void(0)" data-id="{{$content->id}}" onclick="RemoveImage({{$content->id}},{{ "'$img'"}})"><i class="fas fa-times"></i></a></div>
                                        </div>
                                    </div>
                                      @endforeach
                                      @endif
                                  </div>
                                      
                                    <div id="image_preview" class="row"></div>
                                      @include('alerts.feedback', ['field' => 'content_thumb'])
                                    </div>
                                 </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
  $("#content_thumb").change(function(){
     $('#image_preview').html("");
     var total_file=document.getElementById("content_thumb").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#image_preview').append("<div class='col-md-3 col-sm-3 mb-4'><img src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
     }
  });
  $('.image_remove > a').click(function(){
   $(this).closest('.parent_image').remove();
});
  function RemoveImage(id,img){
     $.ajax({
            type:"GET",
            url: APP_URL+'/remove-content-thumb',
            data: {'id':id,'img':img},
            success: function(response) {
                alert(response);
                // data = JSON.parse(response.data);
            }
        });
  }
</script>