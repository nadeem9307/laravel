@extends('layouts.app', ['page' => __('Orders Management'), 'pageSlug' => 'orders'])
@section('page_css')
<style type="text/css">
    .datepicker td p {
    color: black;
}
.table-condensed p {
    color: black;
}
</style>>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                   <form method="post" action="{{ route('orders') }}" id="filter_form" autocomplete="off">
                     @csrf 
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Order Details') }}</h4>
                        </div>
                        <div class="col-2 ">
                             <button type="submit" class="btn btn-primary form-control" id="donload_csv">CSV</button>
                        </div>
                        <div class="col-2">
                             <button type="submit" class="btn btn-primary form-control" id="donload_pdf">PDF</button>
                        </div>
                    </div>
                    
                      
                    <div class="row">
                            <div class="col-3 date_input">
                            <label>{{ __('Select From Date') }}</label>
                           <input class="datepicker form-control" id="from_date" data-date-format="yyyy/mm/dd" name="from_date" placeholder="yyyy/mm/dd" required="true">
                        </div>
                        <div class="col-3 date_input">
                            <label>{{ __('Select To Date') }}</label>
                           <input class="datepicker form-control" id="to_date" data-date-format="yyyy/mm/dd" name="to_date" placeholder="yyyy/mm/dd" required="true">
                        </div>
                        <div class="col-2">
                             <label>{{ __('Select Order Status') }}</label>
                             <select class="form-control select_custom" name="order_status">
                                <option value="">{{ __('Choose Status') }}</option>
                                <option value="Pending">{{ __('Pending') }}</option>
                                <option value="Processing">{{ __('Processing') }}</option>
                                <option value="Rejected">{{ __('Rejected') }}</option>
                                <option value="Delivered">{{ __('Delivered') }}</option>
                            </select>
                        </div>
                        <div class="col-3">
                             <label></label>
                            <button type="submit" class="btn btn-primary form-control" id="filter_data">Filter</button>
                        </div>
                      
                    </div>
                </form>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Order ID') }}</th>
                                <th scope="col">{{ __('Customer Name') }}</th>
                                <th scope="col">{{ __('Order Status') }}</th>
                                <th scope="col">{{ __('Order Date') }}</th>
                                <th scope="col">{{ __('Order Total') }}</th>
                                <th scope="col">{{ __('Payment Status') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @if(isset($orders))
                                @foreach ($orders as $key=> $order)
                                    @php 
                                    $order_status = App\Helpers\Helper::OrderStatus($order->order_id);
                                    @endphp
                                    <tr>
                                        <td>#{{ $order->order_id}}</td>
                                        <td>{{ $order->user->first_name}}</td>
                                        <td>
                                            @if($order_status == 'Pending')
                                            <spam class="btn btn-primary animation-on-hover">{{ $order_status }}</spam></td>
                                            @elseif($order_status == 'Processing')
                                            <spam class="btn btn-info animation-on-hover">{{ $order_status }}</spam></td>
                                            @elseif($order_status == 'Delivered')
                                            <spam class=" btn btn-success animation-on-hover">{{ $order_status }}</spam></td>
                                            @elseif($order_status == 'Rejected')
                                            <spam class="btn btn-danger animation-on-hover">{{ $order->order_status }}</spam></td>
                                            @endif
                                            
                                        <td>{{ date('d/m/Y',strtotime($order->order_date)) }}</td>
                                        <td>CHF {{$order->order_total}}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        
                                        
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($order->order_id = $order->order_id)
                                                            <form action="{{ route('orders.destroy', $order->order_id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('orders.edit', $order->order_id) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('orders.edit',$order->order_id) }}">{{ __('Edit') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <p>No Record Found.</p>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        @if(!empty($orders))
                        {{$orders->render()}}
                        @endif
                    </nav>
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
$('document').ready(function(){
    $('#filter_data').on('click',function(){
         $("#filter_form").attr("action", "{{route('orders')}}");
    });
     $('#donload_pdf').on('click',function(){
         $("#filter_form").attr("action", "{{route('donload_pdf')}}");
         $("#filter_form").attr("method", "get");
    });
    $('#donload_csv').on('click', function(){
        $("#filter_form").attr("action", "{{route('donload_csv')}}");
        $("#filter_form").attr("method", "get");
         // var from_date = $('#from_date').val();
         // var to_date = $('#to_date').val();
         // var status = $('#order_status :selected').val()
         // if(from_date == ''){
         //    alert('Please select from range date');
         //    return false;
         // }
         // if(to_date == ''){
         //    alert('Please select to range date ');
         //    return false;
         // }
         // $.ajax({
         //        type:"GET",
         //        url: APP_URL+'/donload_csv',
         //        data: {'from_date':from_date,'to_date':to_date,'status':status},
         //        success: function(response) {
         //            //alert(response.success);
         //            // data = JSON.parse(response.data);
         //        }
         //    });
    });
 });
</script>
@endsection
