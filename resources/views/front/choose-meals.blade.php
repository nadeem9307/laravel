<!DOCTYPE html>

<html lang="en">

<head>

    <!-- ========== Meta Tags ========== -->

   <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- ========== Page Title ========== -->

    <title>CookForme</title>

    <!-- ========== Favicon Icon ========== -->

    <link rel="shortcut icon" href="{{asset('public/front')}}/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->

    <link href="{{asset('public/front')}}/css/bootstrap.min.css" rel="stylesheet" />

    <link href="{{asset('public/front')}}/css/font-awesome.min.css" rel="stylesheet" />

    <link href="{{asset('public/front')}}/css/flaticon-set.css" rel="stylesheet" />

    <link href="{{asset('public/front')}}/css/magnific-popup.css" rel="stylesheet" />

    <link href="{{asset('public/front')}}/css/owl.carousel.min.css" rel="stylesheet" />

    <link href="{{asset('public/front')}}/css/owl.theme.default.min.css" rel="stylesheet" />

    <link href="{{asset('public/front')}}/css/animate.css" rel="stylesheet" />

    <link href="{{asset('public/front')}}/css/bootsnav.css" rel="stylesheet" />

    <link href="{{asset('public/front')}}/css/style.css" rel="stylesheet">

    <link href="{{asset('public/front')}}/css/responsive.css" rel="stylesheet" />

    <link href="{{asset('public/front')}}/css/cust.css" rel="stylesheet" />

    <!-- ========== End Stylesheet ========== -->

    <!-- ========== Google Fonts ========== -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600,700,800" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">

</head>

<body class="over_flow_body">

    <section class="choose_meals_panel">

      <div class="container-fluid">

        <div class="wrap_two_div_meals">

            <!--ONE-->

            <div class="one_div_wrap_meals">

              <!--  <div class="here_wed_crum">

                   <ul class="list-inline">

                       <li class="logo_div_here"><a href="#"><img src="{{asset('public/front')}}/img/logo.png" class="logo" alt="Logo"></a></li>

                       <li><a href="#">Plan</a></li>

                       <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                         <li><a href="#">Day</a></li>

                       <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                        <li class="active_cl">Meals</li>

                       <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>

                       <li><span>Checkout</span></li>

                   </ul>

               </div> -->

                <div class="wrap_cl_make__asj">

                 <ul class="list-inline">

                    @if(isset($menus)&& !empty($menus))

                  @foreach ($menus as $menu)

                      <li class="here_wid_wrap" >

                        <div class="name_wrpa_cl__abfed">

                             @php

                             $img_array = '';

                             if(isset($menu->menu_thumb) && !empty($menu->menu_thumb)){

                              $img_array = json_decode($menu->menu_thumb, true);

                              }

                             @endphp

                             <div class="view_menu_modal" limit="" menuid="{{$menu->id}}">  

                              <!-- <b class="tag_line">Top Rated</b>-->

                             <img class="img-fluid" src="{{ asset('public/uploads') }}/menus/{{$img_array[0] ?? ''}}" alt="image">

                                   <small>Price CHF {{$menu->price ?? ''}}</small>

                             </div>

                             <h2>{{substr($menu->translation()->first()?$menu->translation()->first()->menu_name:$menu->menu_name, 0, 30)}}</h2>

                             <h5><i>{{substr($menu->translation()->first()?$menu->translation()->first()->sort_description:$menu->sort_description, 0, 30)}}</i></h5>

                             <div class="btn_clis__sed">

                               <div class="meal-card__footer mt-auto">

                                   <div class="nutrition-info-container ">
                                      @if(isset($menu->calories))
                                       <div class="nutrition-info__item border_cl_cal">{{$menu->calories}}<div>Cals</div>

                                       </div>
                                       @endif
                                       @if(isset($menu->carbs))
                                       <div class="nutrition-info__item border_cl_cal">{{$menu->carbs ?? ''}}<div>Carbs</div>

                                       </div>
                                        @endif
                                       @if(isset($menu->protein))
                                       <div class="nutrition-info__item ">{{$menu->protein ?? ''}}<div>Protein</div>

                                       </div>
                                       @endif
                                   </div>

                                <button class="fr-add-button meal-card__add-button add-to-order" menu-id="{{$menu->id}}" menu-thumb="{{$img_array[0] ?? ''}}" menu-name="{{$menu->menu_name}}" price="{{$menu->price ?? ''}}" menu-desc="{{$menu->sort_description}}" menu-quantity="1">

                                  <i class="fa fa-plus" aria-hidden="true" ></i> {{__('messages.add')}}</button>

                               </div>

                             </div>

                        </div>

                      </li>

                  @endforeach

                  @endif

                     </ul>

                </div>

            </div>

            <!--TWO-->

            <div class="two_div_wrap_meals">

               <div class="right_bir_git">
                 <form action="{{route('checkout')}}" method="get">
                  <div class="here_cl_mak__erw">

                    <ul class="list-inline new_chhos_warpa" id="order_items">


                      </ul>    

                  </div>

                    <div class="right_cl_content_content">

                        

                          <small><i class="far fa-doller"></i><b> {{__('messages.Order_Tot')}}:<b> CHF <span class="total_amount">{{ Cart::getSubTotal() }}</span></b></small>
                          @if(isset($coupon_value))<br>
                          <small><i class="far fa-doller"></i><b> Coupon Amount:<b> CHF <span class="coupon_amount">{{ $coupon_value }}</span></b></small>
                          @endif
                          <br />

                          <input type="hidden"  name="menu" value="">

                          <small><i class="far fa-calendar-alt"></i> {{__('messages.Choos_Del_Date')}}:</small>

                        
                              <input type="hidden" name="email" value="{{$email}}">

                              <input type="hidden" name="zip" value="{{$zip}}">

                          <button type="submit" id="nxt-btn" class="disabled" >{{__('messages.next')}} <i class="fas fa-long-arrow-alt-right"></i></button>

                         </form>

                        <div class="bottom_footer_meals">

                          <ul class="list-inline" >

<!--

                              <li class="exceed_value">

                                  <p><span class="red_cl_mh">0</span>/ <span>0 meals</span></p>

                              </li>

-->

                              <li>

                                  <button  type="button" id="clr-all-btn" class="float-right"><i class="far fa-trash-alt"></i> {{__('messages.clear_all')}}</button>

                              </li>

                          </ul>

                      </div>

                    </div>

              </div>

            </div>

        </div>

      </div>

    </section>

<!-------MODEL------>

<section class="model_section_content_wrpa" id="modal-section">

</section>

    <!-- jQuery Frameworks  =========================================== -->

    <script src="{{asset('public/front')}}/js/jquery-1.12.4.min.js"></script>

    <script src="{{asset('public/front')}}/js/bootstrap.min.js"></script>

    <script src="{{asset('public/front')}}/js/equal-height.min.js"></script>

    <script src="{{asset('public/front')}}/js/imagesloaded.pkgd.min.js"></script>

    <script src="{{asset('public/front')}}/js/jquery.magnific-popup.min.js"></script>

    <script src="{{asset('public/front')}}/js/modernizr.custom.13711.js"></script>

    <script src="{{asset('public/front')}}/js/owl.carousel.min.js"></script>

    <script src="{{asset('public/front')}}/js/wow.min.js"></script>

    <script src="{{asset('public/front')}}/js/bootsnav.js"></script>

    <script src="{{asset('public/front')}}/js/main.js"></script>

    <script>

      $(document).ready(function(){

        $('#carousel-example-generic').carousel({

            pause: true,

            interval: false

        });

        $(".view_menu_modal").click(function(){

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({

                /* the route pointing to the post function */

                url: "{{url('/')}}/postajaxmenu",

                type: 'POST',

                /* send the csrf-token and the input to the controller */

                data: {_token: CSRF_TOKEN, message:

                  $(this).attr('menuid'),limit:$(this).attr('limit')},

                dataType: 'JSON',

                /* remind that 'data' is the response of the FrontController */

                success: function (data) {

                //console.log(data.subject);

                    $("#modal-section").html(data.subject);

                    $('.bs-example-modal-lg').modal('show');

                }

            });

        });

       $(document).on('click','.add-to-order',function(){
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

         var product_id = $(this).attr('menu-id');

            $.ajax({

                url: "{{url('/')}}/product_add",

                type: 'POST',

                data: {_token: CSRF_TOKEN, product_id: product_id, action: 'add'},

                success: function (data) {

                 $("#order_items").html(data.data);

                 $(".total_amount").html(data.subTotal);

                    if(!data.count){

                  $('#nxt-btn').attr('disabled',true);

                 }else{

                   $('#nxt-btn').attr('disabled',false);

                 }  

                }

            });

        });

       $(window).load(function() {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          var product_id = $(this).attr('menu-id');

            $.ajax({

                url: "{{url('/')}}/product_add",

                type: 'POST',

                data: {_token: CSRF_TOKEN, product_id: product_id, action: 'minus' },

                success: function (data) {

                 $("#order_items").html(data.data);

                 $(".total_amount").html(data.subTotal);  

                 if(!data.count){

                  $('#nxt-btn').attr('disabled',true);

                 }else{

                   $('#nxt-btn').attr('disabled',false);

                 }   

                }

            });

        });

       $(document).on('click','.btn-reduce',function(){

         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          var product_id = $(this).attr('menu-id');

            $.ajax({

                url: "{{url('/')}}/product_add",

                type: 'POST',

                data: {_token: CSRF_TOKEN, product_id: product_id, action: 'minus' },

                success: function (data) {

                 $("#order_items").html(data.data);

                 $(".total_amount").html(data.subTotal);  

                 if(!data.count){

                  $('#nxt-btn').attr('disabled',true);

                 }else{

                   $('#nxt-btn').attr('disabled',false);

                 }   

                }

            });

        });

       $(document).on('click','.remove-meal',function(){
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          var product_id = $(this).attr('menu-id');
            $.ajax({
                url: "{{url('/')}}/remove_item",
                type: 'POST',
                data: {_token: CSRF_TOKEN, product_id: product_id, action: 'clear' },
                success: function (data) {
                 $("#order_items").html(data.data);
                 $(".total_amount").html(data.subTotal);
                 if(!data.count){
                  $('#nxt-btn').attr('disabled',true);
                 }else{
                   $('#nxt-btn').attr('disabled',false);
                 }  
                }

            });

        });

       $(document).on('click','#clr-all-btn',function(){

         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          var product_id = $(this).attr('menu-id');

            $.ajax({

                url: "{{url('/')}}/remove_item",

                type: 'POST',

                data: {_token: CSRF_TOKEN, product_id: product_id, action: 'clear_all' },

                success: function (data) {

                 $("#order_items").html(data.data);

                 $(".total_amount").html(data.subTotal); 

                 if(!data.count){

                  $('#nxt-btn').attr('disabled',true);

                 }else{

                   $('#nxt-btn').attr('disabled',false);

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

                 $("#order_items").html(data.data);

                 $(".total_amount").html(data.subTotal);  

                 if(!data.count){

                  $('#nxt-btn').attr('disabled',true);

                 }else{

                   $('#nxt-btn').attr('disabled',false);

                 }   

                }

            });
        });
       
       /*************check all date will be filled**************/
       // $(document).on('click','#nxt-btn', function(e){
       //   var flag = false;
       //    $('.delivery_day').each(function(){
       //     var sickfull = $(this).val();
       //     console.log(sickfull);
       //      if (sickfull !='') {
       //        flag = true;
                 
       //      }else{
       //        flag = false;
       //      }
       //    });
       //    if(flag){
       //      $("form").submit();
       //    }else{
       //       alert("Please select a delivery date.");
       //          e.preventDefault();
       //          return false;
       //        }
       // });
    });

    </script>

</body>

</html>