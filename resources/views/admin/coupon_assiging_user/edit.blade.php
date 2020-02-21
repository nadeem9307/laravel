@extends('layouts.app', ['page' => __('Coupon Assigning Management'), 'pageSlug' => 'addcoupontouser'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('assign-coupon-to-user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('assign-coupon-to-user.update', $assign_coupon_to_user) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $assign_coupon_to_user->first_name) }}" required autofocus readonly="true">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $assign_coupon_to_user->email) }}" required readonly="true">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                 <div class="form-group{{ $errors->has('coupon_status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Available Coupon') }}</label>
                                    <select class="form-control select_custom" title="Single Select" tabindex="-98" id="coupon_id" name="coupon_id" required="true">
                                        <option value="">Select Coupon</option>
                                    @if(!empty($coupons))
                                    @foreach($coupons as $key => $val)
                                    <option value="{{$val->id}}" @if (isset($assigned_coupon->coupon_id) && $assigned_coupon->coupon_id == $val->id) {{ 'selected'}} @endif>{{$val->coupon_code}}</option>
                                    @endforeach
                                    @else
                                    <option value="">{{__('No Coupon Available')}}</option>
                                    @endif                                   
                                      @include('alerts.feedback', ['field' => 'coupon_code'])
                                    </select>
                                </div>
                                 <div class="form-group{{ $errors->has('coupon_expiry') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Available Coupon Expiry') }}</label>
                                    <select class="form-control select_custom" title="Single Select" tabindex="-98" id="coupon_expiry" name="coupon_expiry"> 
                                        <option></option>                               
                                      @include('alerts.feedback', ['field' => 'coupon_expiry'])
                                    </select>
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
<script type="text/javascript">
    jQuery('document').ready(function(){
         var id = jQuery('#coupon_id').val();
        GetCouponExpiry(id);
        jQuery('#coupon_id').on('change',function(){
        var id = jQuery(this).val();
        GetCouponExpiry(id);
      
       });
    });
    function GetCouponExpiry(id){
         if(id !=''){
            $.ajax({
            type:"GET",
            url: APP_URL+'/coupon_expiry',
            data: {'id':id},
            success: function(response) {
                console.log(response.success);
                if(response.success ='true'){
                    jQuery('#coupon_expiry').html('<option val="'+response.coupon_expiry.coupon_end_date+'">'+response.coupon_expiry.coupon_end_date+'</option');
                }else{
                    jQuery('#coupon_expiry').html('<option val="">No Date Available</option>');
                }
               
                // data = JSON.parse(response.data);
            }
        });
        }
    }
  
     
 

</script>
@endsection
