@extends('layouts.app', ['page' => __('Menus Management'), 'pageSlug' => 'menu'])
@section('page_css')
<style type="text/css">
    .image_remove {
       position: absolute;
        top: 0;
        right: 0;
        line-height: 11px;
        background-color: #ff0d0d;
        padding: 5px;
        height: 22px;
        width: 22px;
        text-align: center;
        border-radius: 100%;
        cursor: pointer;
    }
    .image_remove a{
            color: #fff;
        font-size: 10px;
    }
</style>
@endsection
@section('content')
    <div class="container-fluid mt--7">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Menu Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('menus.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('menus.update',$menu) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                             @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Menu information') }}</h6>
                            <input type="hidden" name="id" value="{{$menu->id}}">
                            <div class="pl-lg-4">
                                 <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-category">{{ __('Category') }}</label>
                                    <select class="form-control select_custom" title="Single Select" tabindex="-98" name="category">
                                    <option value="">Select Category</option>
                                    @if(!empty($category))
                                    @foreach($category as $key => $cat)
                                    @if($cat->id == $menu->category_id))
                                    <option value="{{$cat->id}}" selected="selected">{{$cat->name ??''}}</option>
                                    @else
                                       <option value="{{$cat->id}}" >{{$cat->name ??''}}</option>
                                      @endif
                                    @endforeach
                                    @endif
                                    @include('alerts.feedback', ['field' => 'category'])
                                    </select>
                                </div>
                               
                                <div class="form-group{{ $errors->has('menu_name_en') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="menu_name_en">{{ __('Menu Name(EN)') }}</label>
                                    <input type="text" name="menu_name_en" id="menu_name_en" class="form-control form-control-alternative{{ $errors->has('menu_name_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Menu Name(EN)') }}" value="{{old('menu_name_en',$menu->menu_name) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'menu_name_en'])
                                </div>
                                <div class="form-group{{ $errors->has('menu_name_fr') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="menu_name_fr">{{ __('Menu Name(FR)') }}</label>
                                    <input type="text" name="menu_name_fr" id="menu_name_fr" class="form-control form-control-alternative{{ $errors->has('menu_name_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Menu Name(FR)') }}" value="{{ $menu->translation('fr')->first()?$menu->translation('fr')->first()->menu_name:'' }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'menu_name_fr'])
                                </div>
                                <div class="form-group{{ $errors->has('menu_name_it') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="menu_name_it">{{ __('Menu Name(IT)') }}</label>
                                    <input type="text" name="menu_name_it" id="menu_name_it" class="form-control form-control-alternative{{ $errors->has('menu_name_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Menu Name(IT)') }}" value="{{ $menu->translation('it')->first()?$menu->translation('it')->first()->menu_name:'' }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'menu_name_it'])
                                </div>
                                <div class="form-group{{ $errors->has('menu_name_de') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="menu_name_de">{{ __('Menu Name(DE)') }}</label>
                                    <input type="text" name="menu_name_de" id="menu_name_de" class="form-control form-control-alternative{{ $errors->has('menu_name_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Menu Name(DE)') }}" value="{{ $menu->translation('de')->first()?$menu->translation('de')->first()->menu_name:'' }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'menu_name_de'])
                                </div>

                                 <div class="form-group{{ $errors->has('sort_description_en') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="sort_description_en">{{ __('Sort Description(EN)') }}</label>
                                  <textarea rows="3" cols="50" name="sort_description_en" id="sort_description_en" class="form-control form-control-alternative{{ $errors->has('sort_description_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Sort Description(EN)') }}" value="" required>{{ old('sort_description_en',$menu->sort_description) }}</textarea>
                                    @include('alerts.feedback', ['field' => 'sort_description_en'])
                                </div> 
                                 <div class="form-group{{ $errors->has('sort_description_fr') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="sort_description_fr">{{ __('Sort Description(FR)') }}</label>
                                  <textarea rows="3" cols="50" name="sort_description_fr" id="sort_description_fr" class="form-control form-control-alternative{{ $errors->has('sort_description_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Sort Description(FR)') }}" value="" required>{{ $menu->translation('fr')->first()?$menu->translation('fr')->first()->sort_description:'' }}</textarea>
                                    @include('alerts.feedback', ['field' => 'sort_description_fr'])
                                </div> 
                                 <div class="form-group{{ $errors->has('sort_description_it') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="sort_description_it">{{ __('Sort Description(IT)') }}</label>
                                  <textarea rows="3" cols="50" name="sort_description_it" id="sort_description_it" class="form-control form-control-alternative{{ $errors->has('sort_description_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Sort Description(IT)') }}" value="" required>{{ $menu->translation('it')->first()?$menu->translation('it')->first()->sort_description:'' }}</textarea>
                                    @include('alerts.feedback', ['field' => 'sort_description_it'])
                                </div>
                                <div class="form-group{{ $errors->has('sort_description_de') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="sort_description_de">{{ __('Sort Description(DE)') }}</label>
                                  <textarea rows="3" cols="50" name="sort_description_de" id="sort_description_de" class="form-control form-control-alternative{{ $errors->has('sort_description_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Sort Description(DE)') }}" value="" required>{{ $menu->translation('de')->first()?$menu->translation('de')->first()->sort_description:'' }}</textarea>
                                    @include('alerts.feedback', ['field' => 'sort_description_de'])
                                </div> 
                                <div class="form-group{{ $errors->has('menu_description_en') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="menu_description_en">{{ __('Description EN') }}</label>
                                    <textarea rows="10" cols="50" name="menu_description_en" id="menu_description_en" class="form-control form-control-alternative ckeditor{{ $errors->has('menu_description_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description(EN)') }}" value="" required>{{old('menu_description_en',$menu->menu_description) }} </textarea>
                                    @include('alerts.feedback', ['field' => 'menu_description_en'])
                                </div>
                                <div class="form-group{{ $errors->has('menu_description_fr') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="menu_description_fr">{{ __('Description FR') }}</label>
                                    <textarea rows="10" cols="50" name="menu_description_fr" id="menu_description_fr" class="form-control form-control-alternative ckeditor{{ $errors->has('menu_description_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Description(FR)') }}" value="" required>{{ $menu->translation('fr')->first()?$menu->translation('fr')->first()->menu_description:'' }} </textarea>
                                    @include('alerts.feedback', ['field' => 'menu_description_fr'])
                                </div>
                                 <div class="form-group{{ $errors->has('menu_description_it') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="menu_description_it">{{ __('Description IT') }}</label>
                                    <textarea rows="10" cols="50" name="menu_description_it" id="menu_description_it" class="form-control form-control-alternative ckeditor{{ $errors->has('menu_description_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Description(IT)') }}" value="" required>{{ $menu->translation('it')->first()?$menu->translation('it')->first()->menu_description:'' }}  </textarea>
                                    @include('alerts.feedback', ['field' => 'menu_description_it'])
                                </div>
                                <div class="form-group{{ $errors->has('menu_description_de') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="menu_description_de">{{ __('Description DE') }}</label>
                                    <textarea rows="10" cols="50" name="menu_description_de" id="menu_description_de" class="form-control form-control-alternative ckeditor{{ $errors->has('menu_description_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Description(DE)') }}" value="" required>{{ $menu->translation('de')->first()?$menu->translation('de')->first()->menu_description:'' }}  </textarea>
                                    @include('alerts.feedback', ['field' => 'menu_description_de'])
                                </div>


                                  <div class="form-group{{ $errors->has('menu_type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-plan-meal-type">{{ __('Menu Type') }}</label>
                                    <select class="form-control select_custom" name="menu_type" title="Single Select" tabindex="-98">
                                    <option value="">{{ __('Choose menu type') }}</option>
                                    <option value="{{ __('veg') }}" @if ($menu->menu_type) == "veg") {{ 'selected' }} @endif>{{ __('Veg') }}</option>
                                    <option value="{{ __('non veg') }}" @if ($menu->menu_type == "non veg") {{ 'selected' }} @endif>{{ __('Non Veg') }}</option>
                                    @include('alerts.feedback', ['field' => 'menu_type'])
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group{{ $errors->has('menu_size') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-menu-size">{{ __('Menu Size') }}</label>
                                    <input type="text" name="menu_size" id="input-menu-size" class="form-control form-control-alternative{{ $errors->has('menu_size') ? ' is-invalid' : '' }}" placeholder="{{ __('Menu Size') }}" value="{{ old('menu_size',$menu->menu_size) }}" required>
                                    @include('alerts.feedback', ['field' => 'menu_size'])
                                </div> 
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price">{{ __('Price') }}</label>
                                    <input type="text" name="price" id="input-menu-size" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price',$menu->price) }}"   required>
                                    @include('alerts.feedback', ['field' => 'price'])
                                </div> 
                                </div>
                                 <div class="form-groups{{ $errors->has('ingredent_id') ? ' has-danger' : '' }}">
                                  <label class="form-control-label" for="input-features">{{ __('Select Ingredents') }}</label>
                                 <select class="selectpicker form-control select_custom" name="ingredent_id[]" id="ingredent_id" multiple data-live-search="true">
                                  @if(!empty($ingredents))
                                  @foreach($ingredents as $key => $ingredent)
                                  @if(in_array($ingredent->id,json_decode($menu->ingredent_id)))
                                  <option value="{{$ingredent->id}}" selected="selected">{{$ingredent->name}}</option>
                                  @else
                                  <option value="{{$ingredent->id}}">{{$ingredent->name}}</option>
                                  @endif
                                  
                                  @endforeach
                                  @endif
                                  </select>
                                  @include('alerts.feedback', ['field' => 'ingredent_id'])
                                </div>
                                <div class="form-groups{{ $errors->has('features_en') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="features_en">{{ __('Features(EN)') }}</label>
                                    <input type="text" name="features_en" id="features_en" class="form-control form-control-alternative{{ $errors->has('features_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Features(EN)') }}" value="{{ old('features_en',$menu->features) }}" required>
                                    @include('alerts.feedback', ['field' => 'features_en'])
                                </div>
                                <div class="form-groups{{ $errors->has('features_fr') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="features_fr">{{ __('Features(FR)') }}</label>
                                    <input type="text" name="features_fr" id="features_fr" class="form-control form-control-alternative{{ $errors->has('features_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Features(FR)') }}" value="{{ $menu->translation('fr')->first()?$menu->translation('fr')->first()->features:'' }}" required>
                                    @include('alerts.feedback', ['field' => 'features_fr'])
                                </div>
                                <div class="form-groups{{ $errors->has('features_it') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="features_it">{{ __('Features(IT)') }}</label>
                                    <input type="text" name="features_it" id="features_it" class="form-control form-control-alternative{{ $errors->has('features_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Features(IT)') }}" value="{{ $menu->translation('it')->first()?$menu->translation('it')->first()->features:'' }}" required>
                                    @include('alerts.feedback', ['field' => 'features_it'])
                                </div>
                                <div class="form-groups{{ $errors->has('features_de') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="features_de">{{ __('Features(DE)') }}</label>
                                    <input type="text" name="features_de" id="features_de" class="form-control form-control-alternative{{ $errors->has('features_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Features(DE)') }}" value="{{ $menu->translation('de')->first()?$menu->translation('de')->first()->features:'' }}" required>
                                    @include('alerts.feedback', ['field' => 'features_de'])
                                </div>
                                  <div class="form-groups{{ $errors->has('menu_thumb') ? ' has-danger' : '' }}">
                                     <label class="form-control-label" for="input-features">{{ __('Upload Multiple Images') }}</label>
                                      <div class="col-md-12 col-sm-12">
                                      <input type="file" class="mb-4"  id="menu_thumb" name="menu_thumb[]" value="{{ $menu->menu_thumb}}" multiple/>
                                      <div class="row"> 
                                      @if(isset($menu->menu_thumb) && (!empty($menu->menu_thumb)))
                                      @foreach(json_decode($menu->menu_thumb,true) as $key => $img)
                                      <div class="col-md-3 col-sm-3 mb-4 parent_image" >
                                        <div style="position: relative;">
                                            <img src="{{asset('public/uploads/menus/'.$img)}}">
                                            <div class="image_remove"><a href="javascript:void(0)" data-id="{{$menu->id}}" onclick="RemoveImage({{$menu->id}},{{ "'$img'"}})"><i class="fas fa-times"></i></a></div>
                                        </div>
                                    </div>
                                      @endforeach
                                      @endif
                                  </div>
                                      
                                    <div id="image_preview" class="row"></div>
                                      @include('alerts.feedback', ['field' => 'menu_thumb'])
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
  $(document).ready(function() {
  $('#ingredents').selectpicker();
});
</script>
<script type="text/javascript">
  $("#menu_thumb").change(function(){
     $('#image_preview').html("");
     var total_file=document.getElementById("menu_thumb").files.length;
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
            url: APP_URL+'/remove-image',
            data: {'id':id,'img':img},
            success: function(response) {
                alert(response);
                // data = JSON.parse(response.data);
            }
        });
  }
</script>
@endsection