@extends('layouts.app', ['page' => __('Delivery Days Slot Management'), 'pageSlug' => 'deliverydays'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Delivery Days Slots') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('deliverydays.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('deliverydays.update',$deliveryday) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Delivery Days information') }}</h6>
                            <div class="form-group{{ $errors->has('order_day_check') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Select Order Day Check Slot') }}</label>
                                   <select class="form-control select_custom" title="Single Select" tabindex="-98" name="order_day_check">
                                    <option value="Monday" @if ($deliveryday->order_day_check == "Monday") {{ 'selected' }} @endif>{{__('Monday')}}</option>
                                    <option value="Tuesday" @if ($deliveryday->order_day_check == "Tuesday") {{ 'selected' }} @endif>{{__('Tuesday')}}</option>
                                    <option value="Wednesday" @if ($deliveryday->order_day_check == "Wednesday") {{ 'selected' }} @endif>{{__('Wednesday')}}</option>
                                    <option value="Thursday" @if ($deliveryday->order_day_check == "Thursday") {{ 'selected' }} @endif>{{__('Thursday')}}</option>
                                    <option value="Friday" @if ($deliveryday->order_day_check == "Friday") {{ 'selected' }} @endif>{{__('Friday')}}</option>
                                    <option value="Saturday" @if ($deliveryday->order_day_check == "Saturday") {{ 'selected' }} @endif>{{__('Saturday')}}</option>
                                    <option value="Sunday" @if ($deliveryday->order_day_check == "Sunday") {{ 'selected' }} @endif>{{__('Sunday')}}</option>
                                      @include('alerts.feedback', ['field' => 'order_day_check'])
                                    </select>
                                 
                                </div>
                                 <div class="form-group{{ $errors->has('order_before_time') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Set Order Time Slot') }}</label>
                                     <input type="time" name="order_before_time" id="input-name" class="form-control form-control-alternative{{ $errors->has('order_before_time') ? ' is-invalid' : '' }}" placeholder="{{ __('Set Order Time Slot') }}" value="{{ old('order_before_time',$deliveryday->order_before_time) }}" required autofocus>
                                   
                                      @include('alerts.feedback', ['field' => 'order_before_time'])
                                    </select>
                                 <!--  -->
                                </div>
                                <div class="form-group{{ $errors->has('delivery_day') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Select Delivery Day') }}</label>
                                   <select class="form-control select_custom" title="Single Select" tabindex="-98" name="delivery_day">
                                    <option value="Monday" @if ($deliveryday->delivery_day == "Monday") {{ 'selected' }} @endif>{{__('Monday')}}</option>
                                    <option value="Tuesday" @if ($deliveryday->delivery_day == "Tuesday") {{ 'selected' }} @endif>{{__('Tuesday')}}</option>
                                    <option value="Wednesday" @if ($deliveryday->delivery_day == "Wednesday") {{ 'selected' }} @endif>{{__('Wednesday')}}</option>
                                    <option value="Thursday" @if ($deliveryday->delivery_day == "Thursday") {{ 'selected' }} @endif>{{__('Thursday')}}</option>
                                    <option value="Friday" @if ($deliveryday->delivery_day == "Friday") {{ 'selected' }} @endif>{{__('Friday')}}</option>
                                    <option value="Saturday" @if ($deliveryday->delivery_day == "Saturday") {{ 'selected' }} @endif>{{__('Saturday')}}</option>
                                    <option value="Sunday" @if ($deliveryday->delivery_day == "Sunday") {{ 'selected' }} @endif>{{__('Sunday')}}</option>
                                      @include('alerts.feedback', ['field' => 'delivery_day'])
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
<script>

</script>
@endsection