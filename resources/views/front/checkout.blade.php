
    @include('front/layout/header')
<style type="text/css">
    .navbar{
        display: none !important;
    }
    .invalid_coupon:focus {
    border-color: #bb0303;
}
.response_text{
    color: #bb0303;
    text-align: center;
}
</style>

    <section class="panel_form_check_out">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <h1 class="check_herading">{{__('messages.checkout')}}</h1>
                    <div class="right_check_out_form">
                        <div class="head_cl_meke">
                            <div class="form_check_out">
                                @if(!Auth::user())
                                 <h1>{{__('messages.Create_Account')}}</h1>
                                @endif
                               
                                <form action="{{route('checkout/payment')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        @if(!Auth::user())
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="f_name">{{__('messages.First_Name')}}</label>
                                                <input type="text" name="f_name" class="form-control" id="f_name" placeholder="{{__('messages.First_Name')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="l_name">{{__('messages.Last_Name')}}</label>
                                                <input type="text" name="l_name" class="form-control" id="l_name" placeholder="{{__('messages.Last_Name')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="email">{{__('messages.Email')}}</label>
                                                <input type="text" name="email" class="form-control" id="email" placeholder="{{__('messages.Email')}}" value="{{$email}}" required {{session()->has('coupon_code')?'readonly':''}}>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="password">{{__('messages.Password')}} {{__('messages.pass_limit')}}</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="{{__('messages.Password')}} {{__('messages.pass_limit')}}" maxlength="20" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="password">{{__('messages.Confirm')}} {{__('messages.Password')}} {{__('messages.pass_limit')}}</label>
                                                <input type="password" class="form-control" id="cpassword" placeholder=" {{__('messages.Re_Enter')}} {{__('messages.Password')}} {{__('messages.pass_limit')}}" required>
                                                <span id="passerror" class="hidden" style="color:red"></span>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="header_sdkjbvd">
                                                <hr>
                                                <h1>{{__('messages.Delivery_Address')}}</h1>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            @if(!Auth::user())
                                        <div class="checkbox">
                                                <label><input type="checkbox" id="chkboxsameaccname" value="">{{__('messages.Del_Add_chk_str')}}</label>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="fullname">{{__('messages.Full_Name')}}</label>
                                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="{{__('messages.Full_Name')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="address1">{{__('messages.address_1')}}</label>
                                                <input type="text" name="address1" class="form-control" id="address1" placeholder="{{__('messages.address_1')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="address2">{{__('messages.address_2')}} (optional)</label>
                                                <input type="text" name="address2" class="form-control" id="address2" placeholder="{{__('messages.address_2')}} (optional)">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="city">{{__('messages.city')}}</label>
                                                    <input type="text" name="city" class="form-control" id="city" placeholder="{{__('messages.city')}}" required>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="state">{{__('messages.state')}}</label>
                                                    <input type="text" name="state" class="form-control" id="state" placeholder="{{__('messages.state')}}" required>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <span class="change_zip_cl" id="change_zip" style="float: right;color: #54c0d8;font-size: 14px;cursor: pointer;">Change</span>
                                                    <label for="zip">{{__('messages.zip')}}</label>
                                                    <input type="text" name="zip1" class="form-control" id="zip1" placeholder="{{__('messages.zip')}}" value="{{$zip}}" readonly required>
                                                    <span id="errorzip" class="hidden" style="color: red;"></span>
                                                    <input type="hidden" name="zip" class="form-control" id="zip" placeholder="Zip" value="{{$zip}}"  >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="contact">{{__('messages.phone')}}</label>
                                                <input type="text" name="contact" class="form-control" id="contact" placeholder="Phone" required>
                                            </div>
                                    
                                      <!--   <div class="checkbox">
                                            <label><input type="checkbox" value="">Receive SMS text message updates on my orders <i class="fa fa-info-circle"  data-toggle="tooltip" title="Text Data!" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                        </div> -->
                                <input type="hidden" name="order_total" value="{{$cart_total}}">
                                <input type="hidden" name="planid" value="{{$plandetails->id ?? ''}}">
                                <input type="hidden" name="deliverydate" value="">  
                                   
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cl_make_data_here">
                                            <hr class="ht_seddd">
                                            @if(isset($coupon_value))
                                            <p class="today__cbscdjjj"> {{__('messages.today_total')}} <b>CHF {{$cart_total ?? ''}}</b></p>
                                            <p class="today__cbscdjjj"> {{__('Coupon Discont')}} <b>CHF {{$coupon_value ?? ''}}</b></p>
                                            <p class="today__cbscdjjj"> {{__('Amount to Pay')}} <b>CHF {{$cart_total-$coupon_value }}</b></p>
                                            @else

                                            @if(Auth::user())
     
                                           <div class="apply_coupn">
                                                  <div class="ewa__agsr">
                                                    <h1>
                                                             <span>
                                                                  <img src="http://localhost/cookforme_v2/public/front/img/apply-coupon.png" alt="Logo">
                                                             </span>
                                                             {{__('messages.apply_coupon')}}
                                                         </h1>
                                                  </div>       
                                             <div class="row">
                                                  <div class="col-xs-8">
                                                      <div class="coupne_text_sec">
                                                        <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Enter Coupon Code" required="true">
                                                        <span class="response_text"></span>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-4">
                                                      <div class="apply_coupon_btn">
                                                         <button type="button"  class="btn" id="apply_coupon">Apply</button>
                                                      </div>
                                                  </div>
                                             </div>
                                           </div>



                                            <p class="today__cbscdjjj"> {{__('messages.sub_total')}} <b>CHF {{$cart_total ?? ''}}</b></p>
                                            <div class="apply_code_price">
                                                <h5 id="discount"></h5>
                                               <p class="today__cbscdjjj" id="total_after_discount"> </p>
                                            </div>
                                            @else
                                            <p class="today__cbscdjjj"> {{__('messages.sub_total')}} <b>CHF {{$cart_total ?? ''}}</b></p>
                                            @endif
                                   



                                            @endif
                                            @if(!Auth::user())
                                            <button type="submit" disabled="true" class="btn">{{__('messages.next_pay')}}</button>
                                            @else
                                            <button type="submit" class="btn">{{__('messages.next_pay')}}</button>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 sticky_cart">
                <div class="right_cl_make_check_out">
                    <h1 class="check_herading">{{__('messages.ORDER_SUMMARY')}}</h1>
                    <div class="right_cl__make__cljs">
                        <div class="iher_new_lsaki">
                            <p><b>{{__('messages.Delivery_Date')}}</b></p>
                            <div class="form-group">
                                {{ date('d/m/Y')}}
                            </div>
                        </div>

                        <table class="table cuts_tab__new_sh">
                            <tbody>
                                <tr>
                                   
                                   
                                </tr>
                                <tr>
                                    <th>{{__('messages.Shipping')}}</th>
                                    <td><b class="free_make_cl">FREE</b></td>
                                </tr>

                                @if(isset($coupon_value))
                                <tr>
                                    <th>Coupon Discont</th>
                                    <td>CHF {{$coupon_value}}</td>
                                </tr>
                                <tr>
                                    <th><b class="total_hre_ejh">{{__('messages.today_total')}}</b></th>
                                    <td> CHF {{$cart_total-$coupon_value }}</td>
                                </tr>
                                @else
                                <tr>
                                    <th><b class="total_hre_ejh">{{__('messages.today_total')}}</b></th>
                                    <td> CHF {{$cart_total ?? ''}}</td>
                                </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>

                    <div class="wrap_cl_make_ohst">
                        
                            <h1 class="check_herading">{{__('messages.MY_MEALS')}} <a href="javascript:history.back()"><span class="fas fa-plus" style="float: right">Meals</span></a></h1>
                            
                        
                        <table class="table bsye__bporw_make">
                            <tbody>
                               @php
  
                                  $cart_items =  Cart::getContent();
                                 $i =0;
                                  @endphp

                                  @if(isset($cart_items))
                                  @foreach($cart_items as $key => $item)
                                 
                                 @php

                                  $attributes = $item->attributes; 
                                  
                                  if($item->attributes->has('menu_thumb') ){
                                    $selected_img_array = json_decode($attributes->menu_thumb,true);
                                  }
                                    $sort_description = $attributes->sort_description;
                                    $selected_date = $attributes->delivery_date;
                                  
                                  @endphp
                               
                                <tr id="{{$item['id']}}">
                                    <td class="sr_no_scl">{{$item['quantity']}}</td>
                                    <td class="img__serd_bore"><img src="{{ asset('public/uploads') }}/menus/{{$selected_img_array[0] ?? ''}}" class="img-responsive" alt="Image"></td>
                                    <td>
                                        <h3>{{$item['name']}}</h3>
                                        <i>{{substr($sort_description, 0, 30)}}</i>
                                    </td>
                                    <td>
                                        <div class="wrap_data_checkout_date ">
                                    <small><i class="far fa-calendar-alt"></i> {{__('messages.Choos_Del_Date')}}:</small>
                                     <select class="form-control delivery_day" name="delivery_day[]" menu-id="{{$item['id']}}">
                                      @if(isset($delivery_dates) && !empty($delivery_dates))
                                          @foreach($delivery_dates as $key=>$date)
                                                <option value="{{$date ?? ''}}" @if($selected_date == $date) selected="true" @endif>{{$date ?? ''}} , {{date('l', strtotime($date))}}   </option> 
                                           @endforeach
                                     
                                    @endif
                                </select>
                            </div>
                                </td>
                                </tr>
                                @php $i++;
                                @endphp
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>

            
        </div>
    </section>

    <br>


    </section> -->
 @include('front/layout/footer')
    <!-- jQuery Frameworks
    ============================================= -->
<!--     <script src="{{asset('public/front')}}/js/jquery-1.12.4.min.js"></script>
    <script src="{{asset('public/front')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('public/front')}}/js/equal-height.min.js"></script>
    <script src="{{asset('public/front')}}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('public/front')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('public/front')}}/js/modernizr.custom.13711.js"></script>
    <script src="{{asset('public/front')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('public/front')}}/js/wow.min.js"></script>
    <script src="{{asset('public/front')}}/js/bootsnav.js"></script>
    <script src="{{asset('public/front')}}/js/main.js"></script> -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $("#cpassword").keyup(function(){
                if($(this).val()===$("#password").val()){
                    $("#passerror").addClass("hidden");
                    $("button[type=submit]").prop('disabled',false);
                }else{
                    $("#passerror").html("Password did not match!");
                    $("#passerror").removeClass("hidden");
                    $("button[type=submit]").prop('disabled',true);
                }
            })
            

            $("#chkboxsameaccname").click(function(){
                if($(this). is(":checked")){
                    $("input[name=fullname]").val($("input[name=f_name]").val()+' '+$("input[name=l_name]").val());
                }else if($(this). is(":not(:checked)")){
                    $("input[name=fullname]").val('');
                }
            });
            $("#change_zip").click(function(){
               $("input[name=zip]").prop('disabled',false); 
            });
            $("input[name=zip]").blur(function(){
               var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: "{{url('/')}}/validateZipcode",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(this).val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the FrontController */
                    success: function (data) {
                        if(data.status){
                            $("#errorzip").html("");
                            $("#errorzip").addClass("hidden");
                           $("input[name=zip]").attr('disabled',true);
                           $("button[type=submit]").prop('disabled',false); 
                        }else{
                             $("#errorzip").removeClass("hidden");
                            $("#errorzip").html("Delivery not available on given Zip");
                            $("button[type=submit]").prop('disabled',true);
                            console.log(data.status);
                        }
                         
                    }
                });
            });

             $(document).on('change','.delivery_day',function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var product_id = $(this).attr('menu-id');
                var attribute = $(this).val();
                 $.ajax({

                        url: "{{url('/')}}/product_date_update",
                        type: 'POST',
                        data: {_token: CSRF_TOKEN,attribute:attribute, product_id: product_id, action: 'attributes' },
                        success: function (data) { 
                        }

            });
        });

        /************Apply coupon code**************/
        
        $(document).on('click','#apply_coupon',function(){
            var coupon = $('#coupon_code').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
             if(coupon !=''){
                 $.ajax({
                        url: "{{url('/')}}/apply_coupon",
                        type: 'POST',
                        data: {_token: CSRF_TOKEN,'coupon':coupon},
                        success: function (response) { 
                            if(response.status == 'false'){ 
                                $('.response_text').text(response.message);
                                $('#coupon_code').focus();
                                $('#coupon_code').addClass('invalid_coupon');

                            }else if(response.status == 'success'){
                              // $('.response_text').text(response.message);
                              let m = "{{('messages.today_total')}}";
                              $('#discount').text('CHF -'+response.reduce_amount);
                              $('#total_after_discount').html(m+'<b> CHF '+response.grand_total+'</b>');

                            }else{
                                $('.response_text').text('Something went wrong.');
                            }
                            
                        }
                });
             }else{
                $('.response_text').text('coupon code is required');
             }
            });
             
    });
    </script>

