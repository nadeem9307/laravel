@extends('layouts.app', ['page' => __('Coupon Assigning Management'), 'pageSlug' => 'addcoupontouser'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Users') }}</h4>
                        </div>
                       
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Coupon Assigned') }}</th>
                                <th scope="col">{{ __('Coupon Status') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($user_list as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @if(isset($user->coupon_code))
                                                <input type="checkbox" name="selected_email" id="selected_email" value="{{ $user->id}}">
                                                @else
                                                <input type="checkbox" name="selected_email" id="selected_email" disabled="true">
                                             @endif
                                            
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{$user->coupon_code ?? ''}}&nbsp;
                                            @if(!empty($user->coupon_percent))
                                            {{$user->coupon_percent ??''}}%
                                             @endif
                                        </td>
                                        <td>{{$user->coupon_status}}</td>
                                        @if(!empty($user->coupon_end_date))
                                        <td>{{ date("d/m/Y", strtotime($user->coupon_end_date)) }}</td>
                                        @else
                                        <td>Not inserted</td>
                                        @endif
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                         <a class="dropdown-item" href="{{ route('assign-coupon-to-user.edit', $user) }}">{{ __('Edit') }}</a>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="">
                         <button type="button" class="btn btn-success mt-4 pull-right" name="sendmail" id="sendmail">Send Mail</button>
                     </div> 
                    </div>
                </div>
                
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $user_list->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_script')
<script type="text/javascript">
    jQuery('document').ready(function(){      
        jQuery(document).on('click','#sendmail', function(){
        var ids = new Array();
        var n = jQuery("input[name='selected_email']:checked").length;
        if (n > 0){
            jQuery("input[name='selected_email']:checked").each(function(){
                console.log($(this).val());
                ids.push($(this).val());
            });
            alert(ids);
            $.ajax({
            type:"get",
            url: APP_URL+'/send_coupon_email',
            data: {'ids':ids},
            success: function(response) {
                console.log(response.success);
                if(response.success ='true'){
                    
                }else{
                   
                }
               
                // data = JSON.parse(response.data);
            }
        });
        }
        });

    });
   
</script>
@endsection
