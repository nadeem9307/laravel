@extends('layouts.app', ['page' => __('Faq Management'), 'pageSlug' => 'faqs'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Faq Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('faqs.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('faqs.store') }}" autocomplete="off">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Faq information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('title_en') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="title_en">{{ __('Title(EN)') }}</label>
                                <input type="text" name="title_en" id="title_en" class="form-control form-control-alternative{{ $errors->has('title_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Title(EN)') }}" value="{{ old('title_en') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'title_en'])
                            </div>
                            <div class="form-group{{ $errors->has('title_fr') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="title_fr">{{ __('Title(FR)') }}</label>
                                <input type="text" name="title_fr" id="title_fr" class="form-control form-control-alternative{{ $errors->has('title_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Title(FR)') }}" value="{{ old('title_fr') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'title_fr'])
                            </div>
                            <div class="form-group{{ $errors->has('title_it') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="title_it">{{ __('Title(IT)') }}</label>
                                <input type="text" name="title_it" id="title_it" class="form-control form-control-alternative{{ $errors->has('title_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Title(IT)') }}" value="{{ old('title_it') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'title_it'])
                            </div>
                            <div class="form-group{{ $errors->has('title_de') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="title_de">{{ __('Title(DE)') }}</label>
                                <input type="text" name="title_de" id="title_de" class="form-control form-control-alternative{{ $errors->has('title_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Title(DE)') }}" value="{{ old('title_de') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'title_de'])
                            </div>

                            <div class="form-group{{ $errors->has('desc_en') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_en">{{ __('Description(EN)') }}</label>
                                <textarea rows="3" cols="50" name="desc_en" id="desc_en" class="form-control form-control-alternative ckeditor{{ $errors->has('description_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description EN') }}" value="" required>{{ old('desc_en') }}</textarea>
                                @include('alerts.feedback', ['field' => 'desc_en'])
                            </div>
                            <div class="form-group{{ $errors->has('desc_fr') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_fr">{{ __('Description(FR)') }}</label>
                                <textarea rows="3" cols="50" name="desc_fr" id="desc_fr" class="form-control form-control-alternative ckeditor{{ $errors->has('desc_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description FR') }}" value="" required>{{ old('desc_en') }}</textarea>
                                @include('alerts.feedback', ['field' => 'desc_fr'])
                            </div>
                            <div class="form-group{{ $errors->has('desc_it') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_it">{{ __('Description(IT)') }}</label>
                                <textarea rows="3" cols="50" name="desc_it" id="desc_it" class="form-control form-control-alternative ckeditor{{ $errors->has('desc_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description IT') }}" value="" required>{{ old('desc_en') }}</textarea>
                                @include('alerts.feedback', ['field' => 'desc_it'])
                            </div>
                            <div class="form-group{{ $errors->has('desc_de') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_de">{{ __('Description(DE)') }}</label>
                                <textarea rows="3" cols="50" name="desc_de" id="desc_de" class="form-control form-control-alternative ckeditor{{ $errors->has('desc_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description DE') }}" value="" required>{{ old('desc_en') }}</textarea>
                                @include('alerts.feedback', ['field' => 'desc_de'])
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
