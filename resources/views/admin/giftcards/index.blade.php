@extends('layouts.app', ['page' => __('Gift Cards Management'), 'pageSlug' => 'giftcards'])
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
                     @csrf 
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Gift Cards Details') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('S. No') }}</th>
                                <th scope="col">{{ __('Sender Email') }}</th>
                                <th scope="col">{{ __('Recipient Email') }}</th>
                                <th scope="col">{{ __('Coupon Code') }}</th>
                                <th scope="col">{{ __('Coupon Amount') }}</th>
                                <th scope="col">{{ __('Coupon Status') }}</th>
                                <th scope="col">{{ __('Coupon Creation Date') }}</th>
                                <th scope="col">{{ __('Coupon Redeem Date') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                               @if(isset($giftcards))
                               @php $i =1;
                               @endphp
                               @foreach($giftcards as $key => $gift_val)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ ucfirst($gift_val->sender_email ?? '')}}</td>
                                        <td>{{ $gift_val->recipient_email ?? ''}}</td>
                                        <td>{{ $gift_val->coupon_code ?? ''}}</td>
                                        <td>{{ $gift_val->coupon_amt ?? ''}}</td>
                                        <td>{{ ucfirst($gift_val->coupon_status ?? '')}}</td>
                                        <td>{{ $gift_val->created_at ?? ''}}</td>
                                        <td>{{ $gift_val->coupon_redeem_date ?? ''}}</td>
                                        
                                        
                                        </tr>
                                        @php $i++;
                                            @endphp
                                        @endforeach
                                    @endif 

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        @if(!empty($giftcards))
                        {{$giftcards->render()}}
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

