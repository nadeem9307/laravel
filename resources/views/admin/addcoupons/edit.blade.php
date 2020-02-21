@extends('layouts.app', ['page' => __('Coupons Management'), 'pageSlug' => 'addcoupon'])
<style type="text/css">
    .datepicker td p {
    color: black;
}
.table-condensed p {
    color: black;
}
</style>>
@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Coupon Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('addcoupon.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('addcoupon.update',$addcoupon) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Coupons information') }}</h6>
                            <div class="pl-lg-4">
                                <input type="hidden" name="id" value="{{$addcoupon->id}}">
                               
                                <div class="form-group{{ $errors->has('coupon_code') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Coupon Code') }}</label>
                                    <input type="text" name="coupon_code" id="coupon_code" class="form-control form-control-alternative{{ $errors->has('coupon_code') ? ' is-invalid' : '' }}" placeholder="{{ __('Coupon Code') }}" value="{{ old('coupon_code',$addcoupon->coupon_code) }}" size="15" maxlength="15" 
                                    style="text-transform:uppercase" required autofocus>
                                      @include('alerts.feedback', ['field' => 'coupon_code'])
                                   
                                 
                                </div>
                                 <div class="form-group{{ $errors->has('coupon_percent') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Coupon Percentage') }}</label>
                                     <input type="text" name="coupon_percent" id="input-name" class="form-control form-control-alternative{{ $errors->has('coupon_percent') ? ' is-invalid' : '' }}" placeholder="{{ __('ex. 15') }}" value="{{ old('coupon_percent',$addcoupon->coupon_percent) }}"  required autofocus>
                                   
                                      @include('alerts.feedback', ['field' => 'coupon_percent'])
                                    </select>
                                 
                                </div>
                                 <div class="form-group{{ $errors->has('coupon_end_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Coupon End Date') }}</label>
                                     <input type="text" name="coupon_end_date" id="input-name" class="datepicker form-control form-control-alternative{{ $errors->has('coupon_end_date') ? ' is-invalid' : '' }}" placeholder="{{ __('dd/mm/yyyy') }}" value="{{ old('coupon_end_date',$addcoupon->coupon_end_date) }}" required autofocus>
                                   
                                      @include('alerts.feedback', ['field' => 'coupon_end_date'])
                                    </select>
                                 
                                </div>
                                <div class="form-group{{ $errors->has('coupon_status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Coupon Status') }}</label>
                                   <select class="form-control select_custom" title="Single Select" tabindex="-98" name="coupon_status">
                                    <option value="active" @if ($addcoupon->coupon_status == "active") {{ 'selected' }} @endif>{{__('Active')}}</option>
                                    <option value="inactive" @if ($addcoupon->coupon_status == "inactive") {{ 'selected' }} @endif>{{__('Inactive')}}</option>
                                      @include('alerts.feedback', ['field' => 'coupon_status'])
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
           $('.datepicker').datepicker({
    startDate: '-3d',
    autoclose: true
});
        </script>
@endsection