@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Update Settings') }}</h5>
                </div>
                <form method="post" action="{{ route('settings.update',$data['id']) }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')
                            @include('alerts.success')
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('Site Email') }}</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('email') }}" value="{{ old('email', $data['site_email']) }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="form-group{{ $errors->has('contact') ? ' has-danger' : '' }}">
                                <label>{{ __('Site Contact') }}</label>
                                <input type="text" name="contact" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" placeholder="{{ __('contact') }}" value="{{ old('contact', $data['site_contact']) }}">
                                @include('alerts.feedback', ['field' => 'contact'])
                            </div>
                            <div class="form-group{{ $errors->has('contact') ? ' has-danger' : '' }}">
                                <label>{{ __('Published Key') }}</label>
                                <input type="text" name="p_key" class="form-control{{ $errors->has('p_key') ? ' is-invalid' : '' }}" placeholder="{{ __('Published Key') }}" value="{{ old('publish_key', $data['publish_key']) }}">
                                @include('alerts.feedback', ['field' => 'p_key'])
                            </div>
                            <div class="form-group{{ $errors->has('s_key') ? ' has-danger' : '' }}">
                                <label>{{ __('Secret Key') }}</label>
                                <input type="text" name="s_key" class="form-control{{ $errors->has('s_key') ? ' is-invalid' : '' }}" placeholder="{{ __('Secret Key') }}" value="{{ old('secret_key', $data['secret_key']) }}">
                                @include('alerts.feedback', ['field' => 's_key'])
                            </div> 
                            <div class="form-group{{ $errors->has('next_date_range') ? ' has-danger' : '' }}">
                                <label>{{ __('Next Delivery Date Limit') }}</label>
                                <br>
                                <span> (Example. How many dates you want to display  on checkout Here you can set.)</span>
                                <input type="text" name="next_date_range" class="form-control{{ $errors->has('next_date_range') ? ' is-invalid' : '' }}" placeholder="{{ __('Next Delivery Date Limit') }}" value="{{ old('next_date_range', $data['next_date_range']) }}">
                                @include('alerts.feedback', ['field' => 'next_date_range'])
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
