@extends('layouts.app', ['page' => __('Experts Management'), 'pageSlug' => 'experts'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Experts Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('experts.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('experts.store') }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">{{ __('Expert information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('desg') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desg">{{ __('Designation') }}</label>
                                <input type="text" name="desg" id="desg" class="form-control form-control-alternative{{ $errors->has('desg') ? ' is-invalid' : '' }}" placeholder="{{ __('Designation') }}" value="{{ old('desg') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'desg'])
                            </div>
                            <div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc">{{ __('Description') }}</label>
                                <input type="text" name="desc" id="desc" class="form-control form-control-alternative{{ $errors->has('desc') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('desc') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'desc'])
                            </div>
                            <div class="form-group{{ $errors->has('facebook') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="facebook">{{ __('Facebook Links') }}</label>
                               <input type="text" name="facebook" id="facebook" class="form-control form-control-alternative{{ $errors->has('facebook') ? ' is-invalid' : '' }}" placeholder="{{ __('Facebook Links') }}" value="{{ old('facebook') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'facebook'])
                            </div>
                            <div class="form-group{{ $errors->has('twitter') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="twitter">{{ __('Twitter Links') }}</label>
                               <input type="text" name="twitter" id="twitter" class="form-control form-control-alternative{{ $errors->has('twitter') ? ' is-invalid' : '' }}" placeholder="{{ __('Twitter Links') }}" value="{{ old('twitter') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'twitter'])
                            </div>
                            <div class="form-group{{ $errors->has('pinterest') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="pinterest">{{ __('Pinterest Links') }}</label>
                               <input type="text" name="pinterest" id="pinterest" class="form-control form-control-alternative{{ $errors->has('pinterest') ? ' is-invalid' : '' }}" placeholder="{{ __('Pinterest Links') }}" value="{{ old('pinterest') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'Pinterest'])
                            </div>
                            <div class="form-group{{ $errors->has('linkedin') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="linkedin">{{ __('Linkedin Links') }}</label>
                               <input type="text" name="linkedin" id="linkedin" class="form-control form-control-alternative{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" placeholder="{{ __('Linkedin Links') }}" value="{{ old('linkedin') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'linkedin'])
                            </div>
                            <div class="form-groups{{ $errors->has('expert_thumb') ? ' has-danger' : '' }}">
                                 <label class="form-control-label" for="input-features">{{ __('Upload Images') }}</label>
                                  <div class="col-md-12 col-sm-12">
                                  <input type="file" class="mb-4" id="expert_thumb" name="expert_thumb"/>
                                <div id="image_preview" class="row "></div>
                                  @include('alerts.feedback', ['field' => 'expert_thumb'])
                                </div>
                                 </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
