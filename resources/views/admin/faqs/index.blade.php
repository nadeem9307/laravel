@extends('layouts.app', ['page' => __('Faq Management'), 'pageSlug' => 'faqs'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ __("Faqs") }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('faqs.create') }}" class="btn btn-sm btn-primary">{{ __('Add Faq') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">{{ __('Title') }}</th>
                            <th scope="col">{{ __('Description') }}</th>
                            <th scope="col">{{ __('Create Date') }}</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @if(isset($faqs) && !empty($faqs))
                            @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $faq->title }}</td>
                                <td>{{ $faq->description }}</td>
                                <td>{{ $faq->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            @if ($faq->id = $faq->id)
                                            <form action="{{ route('faqs.destroy', $faq->id) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a class="dropdown-item" href="{{ route('faqs.edit', $faq) }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this faq?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                            @else
                                            <a class="dropdown-item" href="{{ route('faqs.edit', $faq->id) }}">{{ __('Edit') }}</a>
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
                    {{$faqs->render()}}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
