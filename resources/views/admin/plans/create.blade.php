@extends('layouts.app', ['page' => __('Plans Management'), 'pageSlug' => 'plans'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Plans Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('plans.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('plans.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Plan information') }}</h6>
                            <div class="pl-lg-4">
                                
                               
                                <div class="form-group{{ $errors->has('plan_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Plan Name') }}</label>
                                    <input type="text" name="plan_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('plan_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Plan Name') }}" value="{{ old('plan_name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'plan_name'])
                                </div>
                                <div class="form-group{{ $errors->has('plan_description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <input type="text" name="plan_description" id="input-description" class="form-control form-control-alternative{{ $errors->has('plan_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('plan_description') }}" required>
                                    @include('alerts.feedback', ['field' => 'plan_description'])
                                </div> 
                                 <div class="form-group{{ $errors->has('plan_meal_limit') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __(' Plan Meal Limit') }}</label>
                                    <input type="number" name="plan_meal_limit" id="plan_meal_limit" class="form-control form-control-alternative{{ $errors->has(' plan_meal_limit') ? ' is-invalid' : '' }}" placeholder="{{ __('Plan Meal Limit') }}" value="{{ old('plan_meal_limit') }}" required>
                                    @include('alerts.feedback', ['field' => ' plan_meal_limit'])
                                </div>

                                  <div class="form-group{{ $errors->has('plan_meal_type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-plan-meal-type">{{ __('Menu Type') }}</label>
                                    <select class="form-control select_custom" name="plan_meal_type" title="Single Select" tabindex="-98">
                                    <option value="">{{ __('Choose menu type') }}</option>
                                    <option value="{{ __('weekly') }}">{{ __('Weekly') }}</option>
                                    <option value="{{ __('monthly') }}">{{ __('Monthly') }}</option>
                                    @include('alerts.feedback', ['field' => 'plan_meal_type'])
                                    </select>
                                </div>
                                 <div class="form-group{{ $errors->has('plan_per_meal_price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-menu-size">{{ __('Plan Per Meal Price') }}</label>
                                    <input type="text" name="plan_per_meal_price" id="plan_per_meal_price" class="form-control form-control-alternative{{ $errors->has('  plan_per_meal_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Plan Per Meal Price') }}" value="{{ old('  plan_per_meal_price') }}" required>
                                    @include('alerts.feedback', ['field' => ' plan_per_meal_price'])
                                </div>  
                                 <div class="form-group{{ $errors->has('plan_price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-menu-size">{{ __('Plan Per Meal Price') }}</label>
                                    <input type="text" name="plan_price" id="plan_price" class="form-control form-control-alternative{{ $errors->has('  plan_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Plan Per Meal Price') }}" value="{{ old('  plan_price') }}" required>
                                    @include('alerts.feedback', ['field' => ' plan_price'])
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
<script>
  $('document').ready(function(){
    $('#plan_per_meal_price').on('keyup',function(){
      var planlim = $('#plan_meal_limit').val();
      if(planlim !=''){
          var planpricepermeal = $('#plan_per_meal_price').val();
          var total  = parseFloat(planlim) * parseFloat(planpricepermeal);
          $('#plan_price').val(total.toFixed(2));
      }else{
        alert('please set plan meal limit');
      }
    });
  });

</script>
@endsection