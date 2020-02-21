@extends('layouts.app', ['page' => __('Ingredents Management'), 'pageSlug' => 'ingredent'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Ingredents Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('menus.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('ingredents.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Ingredent information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name_en') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name_en">{{ __('Name EN') }}</label>
                                    <input type="text" name="name_en" id="name_en" class="form-control form-control-alternative{{ $errors->has('name_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Name(EN)') }}" value="{{ old('name_en') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name_en'])
                                </div>
                                <div class="form-group{{ $errors->has('name_fr') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name_fr">{{ __('Name(FR)') }}</label>
                                    <input type="text" name="name_fr" id="name_fr" class="form-control form-control-alternative{{ $errors->has('name_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Name(FR)') }}" value="{{ old('name_fr') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name_fr'])
                                </div>
                                <div class="form-group{{ $errors->has('name_it') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name_it">{{ __('Name(IT)') }}</label>
                                    <input type="text" name="name_it" id="name_it" class="form-control form-control-alternative{{ $errors->has('name_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Name(IT)') }}" value="{{ old('name_it') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name_it'])
                                </div>
                                <div class="form-group{{ $errors->has('name_de') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name_de">{{ __('Name(DE)') }}</label>
                                    <input type="text" name="name_de" id="name_de" class="form-control form-control-alternative{{ $errors->has('name_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Name(DE)') }}" value="{{ old('name_de') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name_de'])
                                </div>
                                <div class="form-group{{ $errors->has('description_en') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="description_en">{{ __('Description(EN)') }}</label>
                                    <input type="text" name="description_en" id="description_en" class="form-control form-control-alternative{{ $errors->has('description_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Description(EN)') }}" value="{{ old('description_en') }}" required>
                                    @include('alerts.feedback', ['field' => 'description_en'])
                                </div>
                                 <div class="form-group{{ $errors->has('description_fr') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="description_fr">{{ __('Description(FR)') }}</label>
                                    <input type="text" name="description_fr" id="description_fr" class="form-control form-control-alternative{{ $errors->has('description_fr') ? ' is-invalid' : '' }}" placeholder="{{ __('Description(FR)') }}" value="{{ old('description_fr') }}" required>
                                    @include('alerts.feedback', ['field' => 'description_fr'])
                                </div>
                                 <div class="form-group{{ $errors->has('description_it') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="description_it">{{ __('Description(IT)') }}</label>
                                    <input type="text" name="description_it" id="description_it" class="form-control form-control-alternative{{ $errors->has('description_it') ? ' is-invalid' : '' }}" placeholder="{{ __('Description(IT)') }}" value="{{ old('description_it') }}" required>
                                    @include('alerts.feedback', ['field' => 'description_it'])
                                </div>
                                 <div class="form-group{{ $errors->has('description_de') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="description_de">{{ __('Description(DE)') }}</label>
                                    <input type="text" name="description_de" id="description_de" class="form-control form-control-alternative{{ $errors->has('description_de') ? ' is-invalid' : '' }}" placeholder="{{ __('Description(DE)') }}" value="{{ old('description_de') }}" required>
                                    @include('alerts.feedback', ['field' => 'description_de'])
                                </div>

                               <div class="col-md-4 col-sm-4">
                                <h4 class="card-title">Regular Image</h4>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail">
                                    <img src="{{asset('black/img/image_placeholder.jpg')}}" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                  <div>
                                   <span class="btn btn-rose btn-round btn-file">
                                      <span class="fileinput-new">Select image</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="thumb">
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                  </div>
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
