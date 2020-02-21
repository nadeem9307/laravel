@extends('layouts.app', ['page' => __('Experts Management'), 'pageSlug' => 'experts'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ __("Experts") }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('experts.create') }}" class="btn btn-sm btn-primary">{{ __('Add Expert') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                <div class="table-responsive">
                    <table class="table tablesorter" id="">
                        <thead class=" text-primary">
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Designation') }}</th>
                            <th scope="col">{{ __('Description') }}</th>
                            <th scope="col">{{ __('FB Link') }}</th>
                            <th scope="col">{{ __('Twitter Link') }}</th>
                            <th scope="col">{{ __('Pinterest Link') }}</th>
                            <th scope="col">{{ __('Linkedin Link') }}</th>
                            <th scope="col">{{ __('Picture') }}</th>
                            <th scope="col">{{ __('Create Date') }}</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @if(isset($experts) && !empty($experts))
                            @foreach ($experts as $expert)
                            <tr>
                                <td>{{ $expert->name }}</td>
                                <td>{{ $expert->designation }}</td>
                                <td>{{ $expert->description }}</td>
                                <td>{{ $expert->fb_links }}</td>
                                <td>{{ $expert->twitter_links }}</td>
                                <td>{{ $expert->pinterest_links }}</td>
                                <td>{{ $expert->linkedin_links }}</td>
                                <td>{{ $expert->img_path }}</td>
                                <td>{{ $expert->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            @if ($expert->id = $expert->id)
                                            <form action="{{ route('experts.destroy', $expert->id) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a class="dropdown-item" href="{{ route('experts.edit', $expert) }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this expert?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                            @else
                                            <a class="dropdown-item" href="{{ route('experts.edit', $expert->id) }}">{{ __('Edit') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{$experts->render()}}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
