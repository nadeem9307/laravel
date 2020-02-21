@extends('layouts.app', ['page' => __('Coupons Management'), 'pageSlug' => 'addcoupon'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Coupon Management') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('addcoupon.create') }}" class="btn btn-sm btn-primary">{{ __('Add Coupons') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('S.No') }}</th>
                                <th scope="col">{{ __('Coupon Code')}}</th>
                                <th scope="col">{{ __('Coupon Percentage') }}</th>
                                <th scope="col">{{ __('Coupon Status') }}</th>
                                <th scope="col">{{ __('Created at')}}</th>
                                <th scope="col">{{ __('End Date')}}</th>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($addcoupon as $coupon)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $coupon->coupon_code }}</td>
                                        <td>{{ $coupon->coupon_percent }}</td>
                                        <td>{{ $coupon->coupon_status }}</td>
                                        <td>{{ $coupon->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ date('d/m/Y',strtotime($coupon->coupon_end_date)) }}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($coupon->id = $coupon->id)
                                                            <form action="{{ route('addcoupon.destroy', $coupon->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('addcoupon.edit', $coupon->id) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this slot?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('addcoupon.edit',$coupon->id) }}">{{ __('Edit') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                    @php
                                    $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{$addcoupon->render()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
