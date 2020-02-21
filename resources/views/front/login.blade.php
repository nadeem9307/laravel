    @include('front/layout/header')
    <div class=" shadow text-center dark bg-fixed text-light" style="background-image: url({{ asset('public/front') }}/img/banner/18.jpg);">
        <div class="container">
         <div class="contact-us-area default-padding">
            <div class="">
                <div class="row">
                    <div class="contact-box login_from_page">
                        
                        <!-- Start Form -->
                        <div class="col-md-12 form-box ">
                            <div class="form-content">
                               @if($errors->any())
                               <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="heading">
                                <h3>{{__('messages.login')}}</h3>
                            </div>
                            <form action="{{route('login-action')}}" method="POST" class="">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>{{__('messages.Email')}}</label>
                                            <input class="form-control" id="name" name="email" placeholder="Email" type="text" value="{{old('email')}}">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{__('messages.Password')}}</label>
                                            <input class="form-control" id="password" name="password" placeholder="password*" type="password" value="{{old('password')}}">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <button type="submit" name="submit" id="submit">
                                            {{__('messages.login')}} <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Alert Message -->
                                <div class="col-md-12 alert-notification">
                                    <div id="message" class="alert-msg"></div>
                                </div>
                                
                                <div class="col-md-12 nsdfr_ap" style="padding: 0">
                                    <div class="row no-gutters">
                                      <div class="col-md-5">
                                       <div class="dor_pawe_bnt"><a href="{{route('forgot-password')}}">{{__('messages.Forgot_Pass')}}?</a></div>
                                   </div>
                                   <div class="col-md-7">
                                      <div class="do__ajbksd"><span>{{__('messages.Don_have_acc')}}? <a href="{{ url('join-now') }}">{{__('messages.Get_Started')}}</a></span></div>
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
        
    </div>
</section>
@include('front/layout/footer')