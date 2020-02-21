@extends('layouts.app', ['page' => __('Experts Management'), 'pageSlug' => 'experts'])
@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Experts Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('experts.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('experts.update', $expert) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <h6 class="heading-small text-muted mb-4">{{ __('Expert information') }}</h6>
                        <div class="pl-lg-4">
                            <input type="hidden" name="id" value="{{$expert->id}}">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$expert->name}}" required autofocus>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('desg') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desg">{{ __('Designation') }}</label>
                                <input type="text" name="desg" id="desg" class="form-control form-control-alternative{{ $errors->has('desg') ? ' is-invalid' : '' }}" placeholder="{{ __('Designation') }}" value="{{$expert->designation}}" required autofocus>
                                @include('alerts.feedback', ['field' => 'desg'])
                            </div>
                            <div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc">{{ __('Description') }}</label>
                                <input type="text" name="desc" id="desc" class="form-control form-control-alternative{{ $errors->has('desc') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{$expert->description}}" autofocus>
                                @include('alerts.feedback', ['field' => 'desc'])
                            </div>
                            <div class="form-group{{ $errors->has('facebook') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="facebook">{{ __('Facebook Links') }}</label>
                               <input type="text" name="facebook" id="facebook" class="form-control form-control-alternative{{ $errors->has('facebook') ? ' is-invalid' : '' }}" placeholder="{{ __('Facebook Links') }}" value="{{$expert->fb_links}}" autofocus>
                                @include('alerts.feedback', ['field' => 'facebook'])
                            </div>
                            <div class="form-group{{ $errors->has('twitter') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="twitter">{{ __('Twitter Links') }}</label>
                               <input type="text" name="twitter" id="twitter" class="form-control form-control-alternative{{ $errors->has('twitter') ? ' is-invalid' : '' }}" placeholder="{{ __('Twitter Links') }}" value="{{$expert->twitter_links}}" autofocus>
                                @include('alerts.feedback', ['field' => 'twitter'])
                            </div>
                            <div class="form-group{{ $errors->has('pinterest') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="pinterest">{{ __('Pinterest Links') }}</label>
                               <input type="text" name="pinterest" id="pinterest" class="form-control form-control-alternative{{ $errors->has('pinterest') ? ' is-invalid' : '' }}" placeholder="{{ __('Pinterest Links') }}" value="{{$expert->pinterest_links}}" autofocus>
                                @include('alerts.feedback', ['field' => 'Pinterest'])
                            </div>
                            <div class="form-group{{ $errors->has('linkedin') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="linkedin">{{ __('Linkedin Links') }}</label>
                               <input type="text" name="linkedin" id="linkedin" class="form-control form-control-alternative{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" placeholder="{{ __('Linkedin Links') }}" value="{{$expert->linkedin_links}}" autofocus>
                                @include('alerts.feedback', ['field' => 'linkedin'])
                            </div>
                            <div class="form-groups{{ $errors->has('expert_thumb') ? ' has-danger' : '' }}">
                                 <label class="form-control-label" for="input-features">{{ __('Upload Images') }}</label>
                                  <div class="col-md-12 col-sm-12">
                                  <input type="file" class="mb-4" id="expert_thumb" name="expert_thumb"/>
                                <div id="image_preview" class="row ">
                                    <div class="col-md-3 col-sm-3 mb-4 parent_image" >
                                        <div style="position: relative;">
                                            @if(isset($expert->img_path))
                                            <img src="{{asset('public/uploads/experts/'.$expert->img_path)}}">

                                            <div class="image_remove"><a href="javascript:void(0)" data-id="{{$expert->id}}" onclick="RemoveImage({{$expert->id}},{{ "'$expert->img_path'"}})"><i class="fas fa-times"></i></a></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                  @include('alerts.feedback', ['field' => 'expert_thumb'])
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
@section('page_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script type="text/javascript">
  $("#expert_thumb").change(function(){
     $('#image_preview').html("");
     var total_file=document.getElementById("expert_thumb").files.length;
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
            url: APP_URL+'/remove-expert-thumb',
            data: {'id':id,'img':img},
            success: function(response) {
                alert(response);
                // data = JSON.parse(response.data);
            }
        });
  }
</script>
@endsection