@extends('layouts.app', ['page' => __('Ingredents Management'), 'pageSlug' => 'ingredent'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Ingredents') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('ingredents.create') }}" class="btn btn-sm btn-primary">{{ __('Add ingredents') }}</a>
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
                                <th scope="col">{{ __('Image') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($ingredents as $ingredent)
                                    <tr>
                                        <td>{{ $ingredent->name }}</td>
                                        <td>{{ $ingredent->description }}</td>
                                        <td><img src="{{asset('public/uploads/ingredents/'.$ingredent->thumb)}}" height="50px;" width="50px;"></td>
                                        <td>{{ $ingredent->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($ingredent->id = $ingredent->id)
                                                            <form action="{{ route('ingredents.destroy', $ingredent->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('ingredents.edit', $ingredent) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('ingredents.edit',$ingredent->id) }}">{{ __('Edit') }}</a>
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
                        {{$ingredents->render()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
