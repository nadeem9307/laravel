@extends('layouts.app', ['page' => __('Menus Management'), 'pageSlug' => 'menus'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Menus') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('menus.create') }}" class="btn btn-sm btn-primary">{{ __('Add menus') }}</a>
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
                                <th scope="col">{{ __('Type') }}</th>
                                <th scope="col">{{ __('Size') }}</th>
                                <th scope="col">{{ __('Price') }}</th>
                                <th scope="col">{{ __('Image') }}</th>
                                <th scope="col">{{ __('Ingredents') }}</th>
                                <th scope="col">{{ __('Category Name') }}</th>
                                <th scope="col">{{ __('Features') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->menu_name }}</td>
                                        <td>{{Str::limit($menu->menu_description, 10, $end='...') }}</td>
                                        <td>{{ $menu->menu_type }}</td>
                                        <td>{{ $menu->menu_size }}</td>
                                        <td>{{ $menu->price }}</td>
                                        @php $images = json_decode($menu->menu_thumb,true);
                                        @endphp
                                        @if(isset($images))
                                         <td><img src="{{asset('public/uploads/menus/'.$images[0]) ?? ' ' }}" width="50px;" height="50px"></td>
                                        @endif
                                       
                                        <td>{{ $menu->names }}</td>
                                        <td>{{ $menu->category_name }}</td>
                                        <td>{{ $menu->features }}</td>
                                        
                                        <td>{{ $menu->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($menu->id = $menu->id)
                                                            <form action="{{ route('menus.destroy', $menu->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('menus.edit', $menu) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('menus.edit',$menu->id) }}">{{ __('Edit') }}</a>
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
                        {{$menus->render()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
