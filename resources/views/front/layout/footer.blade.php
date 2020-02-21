 <!-- Start Footer 
    ============================================= -->
    <footer class="bg-dark">
        <div class="container">
            <div class="row">

                <div class="f-items col-4 title-effect text-light default-padding">

                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6   item" style="height: 261px;">
                        <div class="f-item address">
                            <img src="{{ asset('public/front') }}/img/logo.png" alt="Logo">
                            <p>
                                Geneva - Switzerland
                            </p>
                            <ul>
                                <li>
                                    <span>{{ __('messages.phone') }}: </span> +41 79 890 08 60
                                </li>
                                <li>
                                    <span>{{ __('messages.Email') }}: </span> <a href="mailto:support@validtheme.com">info@cookforme.ch</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6 item" style="height: 261px;">
                        <div class="f-item link">
                            <h4>{{ __('messages.ABOUT') }}</h4>
                            <ul>
                                <li>
                                    <a href="{{route('contact')}}">{{ __('messages.Contact_Us') }}</a>
                                </li>
                                <li>
                                    <a href="{{route('faq')}}">{{ __('messages.FAQs') }}</a>
                                </li>
                                <li>
                                    <a href="{{route('meals')}}">{{ __('messages.meals') }}</a>
                                </li>
                                <li>
                                 <a href="{{route('about')}}">{{ __('messages.ABOUT') }}</a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <!-- End Single Item -->

                 <!-- Single Item -->
                 <div class="col-md-3 col-sm-6  item" style="height: 261px;">
                    <div class="f-item inst-feed">
                        <h4>Instagram Feed</h4>
                        <ul id="livefeed">
                          <!--   <li>
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/gallery/2.jpg" alt="thumb">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/gallery/6.jpg" alt="thumb">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/gallery/4.jpg" alt="thumb">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/gallery/3.jpg" alt="thumb">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/gallery/5.jpg" alt="thumb">
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-3 col-sm-6 item" style="height: 261px;">
                    <div class="f-item opening-hours">
                        <h4>{{ __('messages.CONTACTING_HOURS') }}</h4>
                        <ul>
                            <li> 
                                <span>{{ __('messages.by_phone') }}: Mon - Sun:</span>
                                <div class="pull-right"> 9.00 am - 6.00 pm </div>
                            </li>
                            <li> 
                                <span>{{ __('messages.by_email') }}:</span>
                                <div class="pull-right"> Anytime </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Item -->

            </div>
        </div>
    </div>
    <!-- Start Footer Bottom -->
    <div class="footer-bottom bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>{{ __('messages.copyright') }}</a></p>
                </div>
                <div class="col-md-6 text-right link">
                    <ul>
                        <li>
                            <a href="{{route('terms-and-conditions')}}">{{ __('messages.Terms_Cond') }}</a>
                        </li>
                        
                        <li>
                            <a href="{{route('privacy-policy')}}">{{ __('messages.Privacy_policy') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!-- End Footer -->

    <!-- jQuery Frameworks
        ============================================= -->
        <script src="{{ asset('public/front') }}/js/jquery-1.12.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
        <script src="{{ asset('public/front') }}/js/bootstrap.min.js"></script>
        
        <script src="{{ asset('public/front') }}/js/equal-height.min.js"></script>
        <script src="{{ asset('public/front') }}/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{ asset('public/front') }}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('public/front') }}/js/modernizr.custom.13711.js"></script>
        <script src="{{ asset('public/front') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('public/front') }}/js/wow.min.js"></script>
        
        <script src="{{ asset('public/front') }}/js/bootsnav.js"></script>
        <script src="{{ asset('public/front') }}/js/main.js"></script>
        <script src="{{ asset('public/front') }}/js/custom.js?v={{date('H:i:s')}}"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

        <script>
            
            
            
          $(function(){
             $('.selectpicker').selectpicker();
             $("a").tooltip({
                'selector': '',
                'placement': 'top',
                'container':'body'
            });
         });
          var APP_URL = {!! json_encode(url('/')) !!}
          $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                /* the route pointing to the post function */
                url: APP_URL+"/feedinstagram",
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                /* remind that 'data' is the response of the FrontController */
                success: function (data) {
                   // console.log(data.status);
                    $("#livefeed").html(data.status);
                    
                }
            });
        })



    </script>
    
</body>

</html>