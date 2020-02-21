@extends('layouts.app', ['page' => __('Order Management'), 'pageSlug' => 'orders'])
@section('page_css')
<style type="text/css">
    .datepicker td p {
    color: black;
}
.table-condensed p {
    color: black;
}
.customer_name{
    color: #fff !important;
}
</style>>
@endsection
@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Order #')}}{{ $orders->order_id }}  {{__('Details') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                         <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('General') }}</th>
                                <th scope="col">{{ __('Billing Details') }}</th>
                                <th scope="col">{{ __('Shipping Details') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @if(!empty($orders))
                                
                                    <tr>
                                        <td>
                                            <label>{{ __('Date Created') }}</label>
                                            <input class="datepicker form-control customer_name" data-date-format="mm/dd/yyyy" name="order_date" placeholder="mm/dd/yyyy" value="{{$orders->order_date ?? ''}}" disabled="true"> 
                                       
                                         <label>{{ __('Payment Status') }}</label>
                                         <select class="form-control select_custom" name="payment_status" id="payment_status" data-orderid="{{$orders->order_id}}">
                                            <option value="">{{ __('Choose Status') }}</option>
                                            <option value="Pending" @if ($orders->payment_status == "Pending") {{ 'selected' }} @endif>{{ __('Pending') }}</option>
                                            <option value="Processing" @if ($orders->payment_status == "Processing") {{ 'selected' }} @endif>{{ __('Processing') }}</option>
                                            <option value="Failed" @if ($orders->payment_status == "Failed") {{ 'selected' }} @endif>{{ __('Failed') }}</option>
                                            <option value="Completed" @if ($orders->payment_status == "Completed") {{ 'selected' }} @endif>{{ __('Completed') }}</option>
                                        </select>
                                        <label>{{ __('Customer') }} :</label>
                                        <input type="text" name="customer_name" class="form-control customer_name" value="{{ $orders->user->first_name ?? ''}}" readonly="true">
                                        </td>
                                        <td><p>{{ $orders->user->first_name ?? ''}} {{ $orders->user->last_name ?? ''}} </p>
                                            <p>{{$orders->user->address_line_1 ?? ''}}    
                                         {{$orders->user->address_line_2 ?? ''}} </p>
                                          <p>{{$orders->user->city ?? ''}}   
                                         {{$orders->user->state ?? ''}} 
                                         {{$orders->user->zip_code ?? ''}} </p>
                                          <br/><br/> 
                                          <label>{{ __('Email') }} :</label>
                                          {{$orders->user->email ?? ''}}
                                          <br/><br/>
                                          <label>{{ __('Phone') }} :</label>
                                          {{$orders->user->phone ?? ''}} 
                                        </td>
                                        <td style="vertical-align: top;"><p>{{ $orders->full_name ?? ''}} </p>
                                            <p>{{ $orders->address_line_1 ?? ''}}    
                                         {{$orders->address_line_2 ?? ''}} </p>
                                          <p>{{$orders->city ?? ''}}   
                                         {{$orders->state ?? ''}} 
                                         {{$orders->zip_code ?? ''}} </p>
                                     </td>
                                        
                                      
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                       <!--  <form method="post" action="" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Delivery Location information') }}</h6>
                            <div class="pl-lg-4">
                                
                               
                                <div class="form-group{{ $errors->has('zipcode') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Enter Zipcode') }}</label>
                                    <input type="number" name="zipcode" id="zipcode" class="form-control form-control-alternative{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Zipcode') }}" value="{{ old('zipcode') }}" required autofocus >
                                    @include('alerts.feedback', ['field' => 'zipcode'])
                                </div>
                                
                               
                                   <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>-->
                    </div> 
                </div>

                <div class="card">
                     <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Order Items ')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                         <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Item') }}</th>
                                <th scope="col">{{ __('Dish Name') }}</th>
                                <th scope="col">{{ __('Dish Desc') }}</th>
                                <th scope="col">{{ __('Dish Qty & Dish Price') }}</th>
                                <th scope="col">{{ __('Order Status') }}</th>
                                <th scope="col">{{ __('Delivery Date') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @if(!empty($order_items))
                                 @foreach($order_items as $key => $item)
                                 @php 
                                  $image = json_decode($item->item_thumb,true);
                                 @endphp
                                    <tr>
                                        @if(isset($image[0]))
                                        <td style="width: 100px;"><img src="{{asset('public/uploads/menus/'.$image[0]) }}" width="50px;" height="50px"></td>
                                        @endif
                                        <td style="width: 100px;">
                                           {{ $item->item_name ?? ''}}
                                        </td>
                                        <td style="width: 200px;">
                                            {{ $item->item_sort_desc ?? ''}}
                                        </td>
                                         
                                         <td style="width: 150px;">
                                           {{ $item->item_quantity ?? ''}} {{__('*')}} {{ $item->item_price ?? ''}}
                                        </td>

                                        <td style="width: 200px;">
                                            <label>{{ __('Order Status') }}</label>
                                         <select class="form-control select_custom order_status" name="order_status" id="order_status" data-orderid="{{$item->item_id}}">
                                            <option value="">{{ __('Choose Status') }}</option>
                                            <option value="Pending" @if ($item->order_status == "Pending") {{ 'selected' }} @endif>{{ __('Pending') }}</option>
                                            <option value="Processing" @if ($item->order_status == "Processing") {{ 'selected' }} @endif>{{ __('Processing') }}</option>
                                            <option value="Rejected" @if ($item->order_status == "Rejected") {{ 'selected' }} @endif>{{ __('Rejected') }}</option>
                                            <option value="Delivered" @if ($item->order_status == "Delivered") {{ 'selected' }} @endif>{{ __('Delivered') }}</option>
                                        </select>
                                        </td> 
                                        <td> <spam class="btn btn-primary animation-on-hover">{{ $item->delivery_date ?? ''}}</spam></td>
                                         
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><b>Order Total: </b> <b>CHF {{$orders->order_total ?? ''}} </b> </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_script')
<script>

$('.datepicker').datepicker({
            startDate: '-3d',
            autoclose: true
});

/******* change order status*/
$('document').ready(function(){
    $('.order_status').on('change', function(){
         var order_status = this.value;
         var orderid = $(this).data("orderid");
         $.ajax({
                type:"GET",
                url: APP_URL+'/change_order_status',
                data: {'orderid':orderid,'order_status':order_status},
                success: function(response) {
                    alert(response.success);
                    // data = JSON.parse(response.data);
                }
            });
    });
    $('#payment_status').on('change', function(){
         var payment_status = this.value;
         var orderid = $(this).data("orderid");
         $.ajax({
                type:"GET",
                url: APP_URL+'/change_payment_status',
                data: {'orderid':orderid,'payment_status':payment_status},
                success: function(response) {
                    alert(response.success);
                    // data = JSON.parse(response.data);
                }
            });
    });
});
</script>
@endsection