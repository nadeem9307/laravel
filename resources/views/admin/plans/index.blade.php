@extends('layouts.app', ['page' => __('Plans Management'), 'pageSlug' => 'plans'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Plans') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('plans.create') }}" class="btn btn-sm btn-primary">{{ __('Add plan') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Plan Meal Limit') }}</th>
                                <th scope="col">{{ __('Plan Meal type') }}</th>
                                <th scope="col">{{ __('Plan Per Meal Price') }}</th>
                                <th scope="col">{{ __('Plan Price') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->plan_name }}</td>
                                        <td>{{ $plan->plan_description }}</td>
                                        <td>{{ $plan->plan_meal_limit }}</td>
                                        <td>{{ $plan->plan_meal_type }}</td>
                                        <td>{{ $plan->plan_per_meal_price }}</td>
                                        <td>{{ $plan->plan_price }}</td>
                                        
                                        <td>{{ $plan->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($plan->id = $plan->id)
                                                            <form action="{{ route('plans.destroy', $plan->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('plans.edit', $plan) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('plans.edit',$plan->id) }}">{{ __('Edit') }}</a>
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
                        {{$plans->render()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
