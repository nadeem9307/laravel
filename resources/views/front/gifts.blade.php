@include('front/layout/header')

  <div class=" shadow text-center dark bg-fixed text-light" style="background-image: url(assets/img/banner/3.jpg);">
        <div class="container">
           <div class="contact-us-area default-padding">
        <div class="container">
            <div class="register_page_content_wrap">
               <h1>{{__('messages.GIVE_THE_GREATEST_GIFT')}}</h1>
                <div class="para_make_cl__der">
                  <p>{{__('messages.GIVE_THE_GREGIFT_str')}}</p>
                    <a href="{{route('gift-purchase')}}" class="give_fresh_btn">{{__('messages.Give_cookforme')}}</a>
                    <a href="{{route('gift-redeem')}}" class="redeem_gifts">{{__('messages.Redeem_Gift')}}</a>
                </div>
            </div>
        </div>
    </div>    
    
     </div>
    </div>
    
<div class="chef-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h3>{{__('messages.Gift')}}</h3>
                        <h2>{{__('messages.GIFT_WORKS')}}</h2>
                      
                    </div>
                </div>
            </div>
          <div class="features-area">
        <div class="container">
            <div class="row">
                <div class="features-items text-center">
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-4 single-item">
                        <div class="item">
                            <i class="flaticon-hamburger"></i>
                            <h4>{{__('messages.Quality_Foods')}}</h4>
                            <p>
                                {{__('messages.Qty_Foods_str')}}
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-4 single-item">
                        <div class="item">
                            <i class="flaticon-delivery"></i>
                            <h4>{{__('messages.Fast_Delivery')}}</h4>
                            <p>
                                {{__('messages.Fast_Del_str')}}
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-4 single-item">
                        <div class="item">
                            <i class="flaticon-catering"></i>
                            <h4>{{__('messages.Deli_Rec')}}</h4>
                            <p>
                               {{__('messages.Deli_Rec_str')}}
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>    
    
    
    <div class="shadow text-center dark bg-fixed-fift text-light" style="background-image: url(assets/img/banner/3.jpg);">
        <div class="container">
           <div class="contact-us-area default-padding">
        <div class="container">
            <div class="register_page_content_wrap_second">
               <h1>{{__('messages.DELIVERED_FRESH')}}</h1>
                <h5>{{__('messages.Chef_prep_meals')}}</h5>
                <div class="para_make_cl__der">
                    <a href="#" class="give_fresh_btn">{{__('messages.Give_cookforme')}}</a>
                  </div>
            </div>
        </div>
    </div>    
    
     </div>
    </div>
    
 
   <section class="partner_her_sldi">
        <div class="container">
            <ul class="partner_logo list-inline">
                 <li>
                 <a href="#">  <img src="{{ asset('public/front') }}/img/par_1.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                     <a href="#">   <img src="{{ asset('public/front') }}/img/par_2.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"><img src="{{ asset('public/front') }}/img/par_3.png" class="img-responsive" alt="Image"></a> 
                 </li>
                 <li>
                      <a href="#"><img src="{{ asset('public/front') }}/img/par_4.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"> <img src="{{ asset('public/front') }}/img/par_5.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"><img src="{{ asset('public/front') }}/img/par_3.png" class="img-responsive" alt="Image"></a>
                 </li>
            </ul>
        </div>
    </section>
    
    @include('front/layout/footer')