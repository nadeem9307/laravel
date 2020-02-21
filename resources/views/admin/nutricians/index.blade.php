@extends('layouts.app', ['page' => __('Nutricians Facts Management'), 'pageSlug' => 'nutricians'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Nutrician Facts') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('nutricians.create') }}" class="btn btn-sm btn-primary">{{ __('Add Nutrician') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Nutrition Facts') }}</th>
                                <th scope="col">{{ __('Serving Size') }}</th>
                                <th scope="col">{{ __('Total Calories') }}</th>
                                <th scope="col">{{ __('Information') }}</th>
                                <th scope="col">{{ __('Menu Name') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($nutricians as $nutrician)
                                    <tr>
                                        <td>{{ $nutrician->description }}</td>
                                        <td>{{ $nutrician->nutrition_facts }}</td>
                                        <td>{{ $nutrician->serving_size }}</td>
                                        <td>{{ $nutrician->calories }}</td>
                                        <td>{{ $nutrician->information }}</td>
                                        <td>{{ $nutrician->menu_id }}</td>
                                        
                                        <td>{{ $nutrician->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($nutrician->id = $nutrician->id)
                                                            <form action="{{ route('nutricians.destroy', $nutrician->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('nutricians.edit', $nutrician->id) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('nutricians.edit',$nutrician->id) }}">{{ __('Edit') }}</a>
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
                        {{$nutricians->render()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
