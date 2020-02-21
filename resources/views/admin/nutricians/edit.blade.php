@extends('layouts.app', ['page' => __('Nutricians Facts Management'), 'pageSlug' => 'nutricians'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Nutricians Facts Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('nutricians.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('nutricians.update',$nutrician) }}" autocomplete="off">
                        @csrf
                        @method('put')
                        <h6 class="heading-small text-muted mb-4">{{ __('Nutricians information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('menu_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-menu">{{ __('Menu Name') }}</label>
                                <select class="form-control select_custom" title="Single Select" tabindex="-98" name="menu_id">
                                    @if(!empty($menus))
                                    @foreach($menus as $key => $menu)
                                    <option value="{{$menu->id}}" @if ($nutrician->menu_id == $menu->id) {{ 'selected' }} @endif>{{$menu->menu_name ??''}}</option>
                                    @endforeach
                                    @endif
                                    @include('alerts.feedback', ['field' => 'menu_id'])
                                </select>
                            </div>


                            <div class="form-group{{ $errors->has('description_en') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-description">{{ __('Description EN') }}</label>
                                <textarea rows="3" cols="50" name="description_en" id="description_en" class="form-control form-control-alternative{{ $errors->has('description_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description EN') }}" value="" required>{{ $nutrician->translation('en')->first()?$nutrician->translation('en')->first()->description:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'description_en'])
                            </div>
                            <div class="form-group{{ $errors->has('description_fr') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-description">{{ __('Description FR') }}</label>
                                <textarea rows="3" cols="50" name="description_fr" id="description_fr" class="form-control form-control-alternative{{ $errors->has('description_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Description EN') }}" value="" required>{{ $nutrician->translation('fr')->first()?$nutrician->translation('fr')->first()->description:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'description_fr'])
                            </div>
                            <div class="form-group{{ $errors->has('description_it') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-description">{{ __('Description IT') }}</label>
                                <textarea rows="3" cols="50" name="description_it" id="description_it" class="form-control form-control-alternative{{ $errors->has('description_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Description IT') }}" value="" required>{{ $nutrician->translation('it')->first()?$nutrician->translation('it')->first()->description:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'description_it'])
                            </div>
                            <div class="form-group{{ $errors->has('description_de') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-description">{{ __('Description DE') }}</label>
                                <textarea rows="3" cols="50" name="description_de" id="description_de" class="form-control form-control-alternative{{ $errors->has('description_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Description DE') }}" value="" required>{{ $nutrician->translation('de')->first()?$nutrician->translation('de')->first()->description:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'description_de'])
                            </div>
                            <div class="form-group{{ $errors->has('information_en') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-description">{{ __('Information EN') }}</label>
                                <textarea rows="3" cols="50" name="information_en" id="information_en" class="form-control form-control-alternative{{ $errors->has('information_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Information EN') }}" value="" required>{{ $nutrician->translation('en')->first()?$nutrician->translation('en')->first()->information:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'information_en'])
                            </div> 
                            <div class="form-group{{ $errors->has('information_fr') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-description">{{ __('Information FR') }}</label>
                                <textarea rows="3" cols="50" name="information_fr" id="information_fr" class="form-control form-control-alternative{{ $errors->has('information_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Information FR') }}" value="" required>{{ $nutrician->translation('fr')->first()?$nutrician->translation('fr')->first()->information:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'information_fr'])
                            </div> 
                            <div class="form-group{{ $errors->has('information_it') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-description">{{ __('Information DE') }}</label>
                                <textarea rows="3" cols="50" name="information_it" id="information_it" class="form-control form-control-alternative{{ $errors->has('information_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Information DE') }}" value="" required>{{ $nutrician->translation('it')->first()?$nutrician->translation('it')->first()->information:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'information_it'])
                            </div>
                            <div class="form-group{{ $errors->has('information_de') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-description">{{ __('Information DE') }}</label>
                                <textarea rows="3" cols="50" name="information_de" id="information_de" class="form-control form-control-alternative{{ $errors->has('information_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Information DE') }}" value="" required>{{ $nutrician->translation('de')->first()?$nutrician->translation('de')->first()->information:'' }}</textarea>
                                @include('alerts.feedback', ['field' => 'information_de'])
                            </div> 
                            <div class="form-group{{ $errors->has('Serving Size') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="serving_size">{{ __('Serving Size') }}</label>
                                <input type="text" name="serving_size" id="plan_meal_limit" class="form-control form-control-alternative{{ $errors->has('serving_size') ? ' is-invalid' : '' }}" placeholder="{{ __('Serving Size') }}" value="{{ old('serving_size',$nutrician->serving_size) }}" required>
                                @include('alerts.feedback', ['field' => 'serving_size'])
                            </div>

                            <div class="row">
                             <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group{{ $errors->has('calories') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-menu-size">{{ __('Total Calories') }}</label>
                                <input type="text" name="calories" id="plan_per_meal_price" class="form-control form-control-alternative{{ $errors->has(' calories') ? ' is-invalid' : '' }}" placeholder="{{ __('Total Calories') }}" value="{{ old('calories',$nutrician->calories) }}" required>
                                @include('alerts.feedback', ['field' => ' calories'])
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group{{ $errors->has('Total Carbs') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="carbs">{{ __('Total Carbs') }}</label>
                                <input type="text" name="carbs" id="carbs" class="form-control form-control-alternative{{ $errors->has('carbs') ? ' is-invalid' : '' }}" placeholder="{{ __('Total Carbs') }}" value="{{ old('carbs',$nutrician->carbs) }}" required>
                                @include('alerts.feedback', ['field' => 'carbs'])
                            </div>


                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group{{ $errors->has('Fat') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-fat">{{ __('Total Fat') }}</label>
                            <input type="text" name="fat" id="fat" class="form-control form-control-alternative{{ $errors->has('Total Fat') ? ' is-invalid' : '' }}" placeholder="{{ __('Total Fat') }}" value="{{ old('fat',$nutrician->fat) }}" required>
                            @include('alerts.feedback', ['field' => ' fat'])
                        </div> 
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group{{ $errors->has('Total Protein') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="protein">{{ __('Total Protein') }}</label>
                            <input type="text" name="protein" id="protein" class="form-control form-control-alternative{{ $errors->has('protein') ? ' is-invalid' : '' }}" placeholder="{{ __('Total Protein') }}" value="{{ old('protein',$nutrician->protein) }}" required>
                            @include('alerts.feedback', ['field' => 'protein'])
                        </div> 
                    </div>  

                    @foreach(json_decode($nutrician->nutrition_facts,true) as $key => $vals)
                    <div class="row input-form">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-12 form-group{{ $errors->has('nutrition_facts_en') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-menu-size">{{ __('Nutrition Facts EN') }}</label>
                            <input type="text" name="nutrition_facts_key_en[]" class="form-control form-control-alternative{{ $errors->has('nutrition_facts_key_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Nutrition Facts EN') }}" value="{{ old('nutrition_facts_key_en',$key) }}" required>
                            @include('alerts.feedback', ['field' => ' nutrition_facts_val_en'])
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 col-12 form-group{{ $errors->has('nutrition_facts_val_en') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-menu-size">{{ __('Nutrition Facts EN%') }}</label>
                            <input type="text" name="nutrition_facts_val_en[]"  class="form-control form-control-alternative{{ $errors->has('  nutrition_facts_val_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Nutrition Facts EN%') }}" value="{{ old('nutrition_facts_val_en',$vals) }}" required>
                            @include('alerts.feedback', ['field' => ' nutrition_facts_val_en'])
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-12 form-group{{ $errors->has('nutrition_facts_fr') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-menu-size">{{ __('Nutrition Facts FR') }}</label>
                            <input type="text" name="nutrition_facts_key_fr[]" class="form-control form-control-alternative{{ $errors->has('nutrition_facts_key_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Nutrition Facts FR') }}" value="{{ old('nutrition_facts_key_fr',$key) }}" required>
                            @include('alerts.feedback', ['field' => ' nutrition_facts_val_fr'])
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 col-12 form-group{{ $errors->has('nutrition_facts_val_fr') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-menu-size">{{ __('Nutrition Facts FR%') }}</label>
                            <input type="text" name="nutrition_facts_val_fr[]"  class="form-control form-control-alternative{{ $errors->has('  nutrition_facts_val_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Nutrition Facts FR%') }}" value="{{ old('nutrition_facts_val_fr',$vals) }}" required>
                            @include('alerts.feedback', ['field' => ' nutrition_facts_val_fr'])
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-12 form-group{{ $errors->has('nutrition_facts_it') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-menu-size">{{ __('Nutrition Facts IT') }}</label>
                            <input type="text" name="nutrition_facts_key_it[]" class="form-control form-control-alternative{{ $errors->has('nutrition_facts_key_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Nutrition Facts IT') }}" value="{{ old('nutrition_facts_key_it',$key) }}" required>
                            @include('alerts.feedback', ['field' => ' nutrition_facts_val_it'])
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 col-12 form-group{{ $errors->has('nutrition_facts_val_it') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-menu-size">{{ __('Nutrition Facts IT%') }}</label>
                            <input type="text" name="nutrition_facts_val_it[]"  class="form-control form-control-alternative{{ $errors->has('  nutrition_facts_val_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Nutrition Facts IT%') }}" value="{{ old('nutrition_facts_val_it',$vals) }}" required>
                            @include('alerts.feedback', ['field' => ' nutrition_facts_val_it'])
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-12 form-group{{ $errors->has('nutrition_facts_de') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-menu-size">{{ __('Nutrition Facts DE') }}</label>
                            <input type="text" name="nutrition_facts_key_de[]" class="form-control form-control-alternative{{ $errors->has('nutrition_facts_key_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Nutrition Facts DE') }}" value="{{ old('nutrition_facts_key_de',$key) }}" required>
                            @include('alerts.feedback', ['field' => ' nutrition_facts_val_de'])
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 col-12 form-group{{ $errors->has('nutrition_facts_val_de') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-menu-size">{{ __('Nutrition Facts DE%') }}</label>
                            <input type="text" name="nutrition_facts_val_de[]"  class="form-control form-control-alternative{{ $errors->has('  nutrition_facts_val_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Nutrition Facts DE%') }}" value="{{ old('nutrition_facts_val_de',$vals) }}" required>
                            @include('alerts.feedback', ['field' => ' nutrition_facts_val_de'])
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-12">
                            <div class="mt-4">
                                <a href="#" class="remove_btn"><i class="fas fa-minus-circle"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-12">
                            <div class="mt-4">
                                <a href="#" class="but_add"><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach


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
<script>
  $(document).ready(function(){
   $('.but_add').click(function(){
      var newel = $('.input-form:last').clone(true);
      $(newel).find("input").val("").end().insertAfter(".input-form:last");
      
  });

   $(document).on("click", ".remove_btn", function(e) {
    var $e = $(e.currentTarget);
    $e.closest('.input-form').remove();
});
});

</script>
@endsection