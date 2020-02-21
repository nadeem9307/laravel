@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'reviews'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Reviews') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">S.No.</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Subject') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($reviews as $review)
                                    <tr>
                                         <td>{{$i}}</td>
                                        <td>
                                            <a href="mailto:{{ $review->email }}">{{ $review->email }}</a>
                                        </td>
                                        <td>{{ $review->subject }}</td>
                                        <td>{{ $review->description }}</td>
                                        @if(!empty($review->created_at))
                                        <td>{{ date("d/m/Y", strtotime($review->created_at)) }}</td>
                                        @else
                                        <td>Not inserted</td>
                                        @endif
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $reviews->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
