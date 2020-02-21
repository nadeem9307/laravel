@include('front/layout/header')

  <!-- Start Banner 
    ============================================= -->
    <div class="banner-area responsive-auto-height banner-form text-medium sub-heading shadow dark bg-fixed gifts_redeem_cl_baner" style="background-image: url(assets/img/banner/6.jpg);">
        <div class="container">
            <div class="row">
                <div class="double-items content">

                    <!-- Start Booking Form -->
                    <div class="col-md-12 col-sm-12 booking-form">
                        <div class="form-box wrap_make_cl_here_nw">
                          @if($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <h2>{{__('messages.redeem_from_title')}}</h2>
                        <b>{{__('messages.redeem_from_subtitle')}}</b>

                        <form action="{{ url('delivery') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <input class="form-control" id="coupon" name="coupon" placeholder="{{__('messages.coupon_code')}}" type="text" value="{{ request()->get('code')??'' }}" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input class="form-control" id="email" name="email" placeholder="{{__('messages.your_email_add')}}" type="email" value="{{ request()->get('email')??'' }}" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input class="form-control" id="zip" name="zip" placeholder="{{__('messages.your_zip_code')}}" type="text" required="">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" name="submit">
                                        {{__('messages.choose_your_meals')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Booking Form -->
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->
<div class="chef-area default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h3>Gift</h3>
                    <h2>HOW THE GIFT WORKS</h2>

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
                                <h4>Quality Foods</h4>
                                <p>
                                    Belonging sir curiosity discovery extremity yet forfeited prevailed own off. Travelling by introduced of mr terminated.
                                </p>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="col-md-4 col-sm-4 single-item">
                            <div class="item">
                                <i class="flaticon-delivery"></i>
                                <h4>Fast Delivery</h4>
                                <p>
                                    Belonging sir curiosity discovery extremity yet forfeited prevailed own off. Travelling by introduced of mr terminated.
                                </p>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="col-md-4 col-sm-4 single-item">
                            <div class="item">
                                <i class="flaticon-catering"></i>
                                <h4>Delicious recipes</h4>
                                <p>
                                    Belonging sir curiosity discovery extremity yet forfeited prevailed own off. Travelling by introduced of mr terminated.
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


<section class="partner_her_sldi">
    <div class="container">
        <ul class="partner_logo list-inline">
         <li>
             <a href="#">  <img src="assets/img/par_1.png" class="img-responsive" alt="Image"></a>
         </li>
         <li>
             <a href="#">   <img src="assets/img/par_2.png" class="img-responsive" alt="Image"></a>
         </li>
         <li>
          <a href="#"><img src="assets/img/par_3.png" class="img-responsive" alt="Image"></a> 
      </li>
      <li>
          <a href="#"><img src="assets/img/par_4.png" class="img-responsive" alt="Image"></a>
      </li>
      <li>
          <a href="#"> <img src="assets/img/par_5.png" class="img-responsive" alt="Image"></a>
      </li>
      <li>
          <a href="#"><img src="assets/img/par_3.png" class="img-responsive" alt="Image"></a>
      </li>
  </ul>
</div>
</section>
@include('front/layout/footer')