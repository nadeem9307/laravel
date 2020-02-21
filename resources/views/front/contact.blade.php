@include('front/layout/header')
    <!-- Start Contact 
        ============================================= -->
        <div class="contact-us-area default-padding">
            <div class="container">
                <div class="row">
                    <div class="contact-box">

                        <!-- Start Form -->
                        <div class="col-md-5 form-box">
                            <div class="form-content">
                                <div class="heading">
                                    @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                    @endif
                                    <h3>A question? contact us</h3>
                                </div>
                                <form action="{{route('contact-submit')}}" method="POST">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                                <span class="alert-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" id="email" name="email" placeholder="Email*" type="email" required="">
                                                <span class="alert-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                                <span class="alert-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group comments">
                                                <textarea class="form-control" id="comments" name="comments" placeholder="Your question and/or comment here *"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <button type="submit" name="submit" id="submit">
                                                Send Message <i class="fa fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Alert Message -->
                                    <div class="col-md-12 alert-notification">
                                        <div id="message" class="alert-msg"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Form -->

                        <div class="col-md-6 col-md-offset-1 info">
                            <h2>Contact Us</h2>
                            <p>
                                Often merit stuff first oh up hills as he. Servants contempt as although addition dashwood is procured. Interest in yourself an do of numerous feelings cheerful confined. 
                            </p>
                            <div class="address-items">
                             <div class="row">
                                <!-- Item -->
                                <div class="col-md-6 col-sm-6 equal-height">
                                    <div class="item">
                                        <div class="icon"><i class="fas fa-map-marked-alt"></i></div> 
                                        <span>Geneva - Switzerland </span>
                                    </div>
                                </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="col-md-6 col-sm-6 equal-height">
                                    <div class="item">
                                        <div class="icon"><i class="fas fa-clock"></i> </div>
                                        <span> info@cookforme.ch</span>
                                    </div>
                                </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="col-md-12 col-sm-12 equal-height">
                                    <div class="item">
                                        <div class="icon"><i class="fas fa-phone"></i></div> 
                                        <span>+41 79 890 08 60 </span>
                                    </div>
                                </div>
                                <!-- End Item -->
                                <!-- Item -->

                                <!-- End Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
    @include('front/layout/footer')