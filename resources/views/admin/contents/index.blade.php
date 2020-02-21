@extends('layouts.app', ['page' => __('Content Management'), 'pageSlug' => 'contents'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ __('Contents') }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('contents.create') }}" class="btn btn-sm btn-primary">{{ __('Add Content') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">{{ __('Title') }}</th>
                            <th scope="col">{{ __('Sub title') }}</th>
                            <th scope="col">{{ __('Description') }}</th>
                            <th scope="col">{{ __('Image') }}</th>
                            <th scope="col">{{ __('Create Date') }}</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @if(isset($contents) && !empty($contents))
                            @foreach ($contents as $content)
                            <tr>
                                <td>{{ $content->title }}</td>
                                <td>{{ $content->sub_title }}</td>
                                <td>{{ $content->description }}</td>
                                <td>{{ $content->content_thumb }}</td>
                                <td>{{ $content->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            @if ($content->id = $content->id)
                                            <form action="{{ route('contents.destroy', $content->id) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a class="dropdown-item" href="{{ route('contents.edit', $content) }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this content?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                            @else
                                            <a class="dropdown-item" href="{{ route('contents.edit',$content->id) }}">{{ __('Edit') }}</a>
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
                    {{$contents->render()}}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
