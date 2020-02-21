@extends('layouts.app', ['page' => __('Delivery Location Management'), 'pageSlug' => 'delivery'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Delivery Location') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('deliverydays.create') }}" class="btn btn-sm btn-primary">{{ __('Add delivery location') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Order Day Check Slot') }}</th>
                                <th scope="col">{{ __('Before Time Slot')}}</th>
                                <th scope="col">{{ __('Delivery Day') }}</th>
                                <th scope="col">{{ __('Created at')}}</th>
                            </thead>
                            <tbody>
                                @foreach ($deliverydays as $days)
                                    <tr>
                                        <td>{{ $days->order_day_check }}</td>
                                        <td>{{ $days->order_before_time }}</td>
                                        <td>{{ $days->delivery_day }}</td>
                                        
                                        
                                        <td>{{ $days->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($days->id = $days->id)
                                                            <form action="{{ route('deliverydays.destroy', $days->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('deliverydays.edit', $days->id) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this slot?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('deliverydays.edit',$days->id) }}">{{ __('Edit') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{$deliverydays->render()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
