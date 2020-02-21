@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'category'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Category Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('category.update', $category) }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('Category information') }}</h6>
                        <div class="pl-lg-4">
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="form-group{{ $errors->has('name_en') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="name_en">{{ __('Name(EN)') }}</label>
                                <input type="text" name="name_en" id="name_en" class="form-control form-control-alternative{{ $errors->has('name_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name_en', $category->name) }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'name_en'])
                            </div>
                            <div class="form-group{{ $errors->has('name_fr') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="name_fr">{{ __('Name(FR)') }}</label>
                                <input type="text" name="name_fr" id="name_fr" class="form-control form-control-alternative{{ $errors->has('name_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Name(FR)') }}" value="{{ $category->translation('fr')->first()?$category->translation('fr')->first()->name:'' }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'name_fr'])
                            </div>
                            <div class="form-group{{ $errors->has('name_it') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="name_it">{{ __('Name(IT)') }}</label>
                                <input type="text" name="name_it" id="name_it" class="form-control form-control-alternative{{ $errors->has('name_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Name(IT)') }}" value="{{ $category->translation('it')->first()?$category->translation('it')->first()->name:'' }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'name_it'])
                            </div>
                            <div class="form-group{{ $errors->has('name_de') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="name_de">{{ __('Name(DE)') }}</label>
                                <input type="text" name="name_de" id="name_de" class="form-control form-control-alternative{{ $errors->has('name_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Name(DE)') }}" value="{{ $category->translation('de')->first()?$category->translation('de')->first()->name:'' }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'name_de'])
                            </div>
                            <div class="form-group{{ $errors->has('desc_en') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_en">{{ __('Description(EN)') }}</label>
                                <input type="text" name="desc_en" id="desc_en" class="form-control form-control-alternative{{ $errors->has('desc_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description(EN)') }}" value="{{ old('desc_en', $category->description) }}" required>
                                @include('alerts.feedback', ['field' => 'desc_en'])
                            </div>
                            <div class="form-group{{ $errors->has('desc_fr') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_fr">{{ __('Description(FR)') }}</label>
                                <input type="text" name="desc_fr" id="desc_fr" class="form-control form-control-alternative{{ $errors->has('desc_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Description FR') }}" value="{{ $category->translation('fr')->first()?$category->translation('fr')->first()->description:'' }}" required>
                                @include('alerts.feedback', ['field' => 'desc_fr'])
                            </div>
                             <div class="form-group{{ $errors->has('desc_it') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_it">{{ __('Description(IT)') }}</label>
                                <input type="text" name="desc_it" id="desc_it" class="form-control form-control-alternative{{ $errors->has('desc_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Description IT') }}" value="{{ $category->translation('it')->first()?$category->translation('it')->first()->description:'' }}" required>
                                @include('alerts.feedback', ['field' => 'desc_it'])
                            </div>
                            <div class="form-group{{ $errors->has('desc_de') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_de">{{ __('Description(DE)') }}</label>
                                <input type="text" name="desc_de" id="desc_de" class="form-control form-control-alternative{{ $errors->has('desc_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Description DE') }}" value="{{ $category->translation('de')->first()?$category->translation('de')->first()->description:'' }}" required>
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
