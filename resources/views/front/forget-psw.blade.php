@include('front/layout/header')
  <div class=" shadow text-center dark bg-fixed text-light" style="background-image: url({{asset('public/front')}}/img/banner/18.jpg);">
        <div class="container">
           <div class="contact-us-area default-padding">
        <div class="">
            <div class="row">
                <div class="contact-box login_from_page">
                    
                    <!-- Start Form -->
                    <div class="col-md-12 form-box ">
                        <div class="form-content">
                            <div class="heading">
                                <h3>FORGOT PASSWORD</h3>
                                <p>Enter your email address, and we’ll email you a link to reset your password</p>
                            </div>
                            <form action="{{route('forgot-pass-action')}}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" id="name" name="email" placeholder="Email" type="email">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="col-md-12">
                                    <div class="row">
                                        <button type="submit" name="submit" id="submit">
                                            Send reset instructions <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Alert Message -->
                                <div class="col-md-12 alert-notification">
                                    <!-- <div id="message" class="alert-msg"></div> -->
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                
                                   <div class="col-md-12 nsdfr_ap" style="padding: 0">
                                    <div class="row no-gutters">
                                      <div class="col-md-5">
                                         <div class="dor_pawe_bnt"><a href="{{route('customer-login')}}">Log In</a></div>
                                        </div>
                                       <div class="col-md-7">
                                          <div class="do__ajbksd"><span>Don’t have an account? <a href="{{route('join-now')}}">Get Started</a></span></div>
                                        </div>    
                                    </div>
                                  </div>
                                
                            </form>
                        </div>
                    </div>
                    <!-- End Form -->

               
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
                 <a href="#">  <img src="{{asset('public/front')}}/img/par_1.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                     <a href="#">   <img src="{{asset('public/front')}}/img/par_2.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"><img src="{{asset('public/front')}}/img/par_3.png" class="img-responsive" alt="Image"></a> 
                 </li>
                 <li>
                      <a href="#"><img src="{{asset('public/front')}}/img/par_4.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"> <img src="{{asset('public/front')}}/img/par_5.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"><img src="{{asset('public/front')}}/img/par_3.png" class="img-responsive" alt="Image"></a>
                 </li>
            </ul>
        </div>
    </section>
    @include('front/layout/footer')