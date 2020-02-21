@extends('layouts.app', ['page' => __('Delivery Location Management'), 'pageSlug' => 'delivery'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Delivery Location') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('deliverylocation.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('deliverylocation.update',$deliverylocation) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Delivery Location information') }}</h6>
                            <div class="pl-lg-4">
                                
                               
                                <div class="form-group{{ $errors->has('zipcode') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Enter Zipcode') }}</label>
                                    <input type="number" name="zipcode" id="zipcode" class="form-control form-control-alternative{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Zipcode') }}" value="{{ old('zipcode',$deliverylocation->zipcode) }}" required autofocus >
                                    @include('alerts.feedback', ['field' => 'zipcode'])
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
@section('page_script')
<script>
$('#zipcode').keypress(function(e) {
    var tval = $('#zipcode').val(),
        tlength = tval.length,
        set = 8,
        remain = parseInt(set - tlength);
    $('p').text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#zipcode').val((tval).substring(0, tlength - 1));
        alert('zipcode length should be below max 7')
        return false;
    }
})
</script>
@endsection