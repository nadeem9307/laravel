@include('front/layout/header')

    <!-- Start About 
        ============================================= -->
        <div class="about-area default-padding">

            <div class="container">

                <div class="row">

                    <div class="about-items">

                        <div class="col-md-6 thumb">
                            @if(isset($details->content_thumb) && !empty($details->content_thumb))
                            @php $str = json_decode($details->content_thumb,true) @endphp
                            <img src="{{asset('public/uploads/contents/'.$str[0])}}" alt="Thumb">
                            @else
                            <img src="{{asset('public/front')}}/img/about/DSC00224.jpg" alt="Thumb">
                            @endif
                        </div>
                        <div class="col-md-6 info">
                            <h3>{!! $details->translation()->first()?$details->translation()->first()->title:'' !!}</h3>

                            <h2>{!! $details->translation()->first()?$details->translation()->first()->sub_title:'' !!}</h2>
                            {!! $details->translation()->first()?$details->translation()->first()->description:'' !!}
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- End About -->
    <!-- Start Deafutl Info

        ============================================= -->
        <!-- End Default Info -->

    <!-- Start Chef Area 

        ============================================= -->

        <div class="chef-area default-padding bottom-less">

            <div class="container">

                <div class="row">

                    <div class="col-md-8 col-md-offset-2">

                        <div class="site-heading text-center">

                            <h3>{{__('messages.chefs')}}</h3>

                            <h2>{{__('messages.meet_our_exp')}}</h2>

                            <p>
                                {{__('messages.expert_str')}}
                            </p>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="chef-items">

                        <!-- Single Item -->
                        @if(isset($experts) && !empty($experts))
                        @foreach($experts as $expert)
                        <div class="col-md-4 single-item">
                            <div class="item">
                                <div class="thumb">
                                    @if(isset($expert->img_path))
                                    <img src="{{asset('public/uploads/experts')}}/{{$expert->img_path}}" alt="Thumb">
                                    @else
                                    <img src="{{asset('public/front/img/no-user.png')}}" alt="Thumb">
                                    @endif
                                </div>

                                <div class="info">

                                    <div class="overlay">

                                        <h4>{{$expert->name}}</h4>

                                        <span>{{$expert->designation}}</span>

                                    </div>

                                    <div class="content">

                                        <p>

                                            {{$expert->description}}

                                        </p>

                                        <ul>
                                            @if(isset($expert->fb_links))
                                            <li class="facebook">

                                                <a href="{{$expert->fb_links}}"><i class="fab fa-facebook-f"></i></a>

                                            </li>
                                            @endif
                                            @if(isset($expert->twitter_links))
                                            <li class="twitter">

                                                <a href="{{$expert->twitter_links}}"><i class="fab fa-twitter"></i></a>

                                            </li>
                                            @endif
                                            @if(isset($expert->pinterest_links))
                                            <li class="pinterest">

                                                <a href="{{$expert->pinterest_links}}"><i class="fab fa-pinterest-p"></i></a>

                                            </li>
                                            @endif
                                            @if(isset($expert->linkedin_links))
                                            <li class="linkedin">

                                                <a href="{{$expert->linkedin_links}}"><i class="fab fa-linkedin-in"></i></a>

                                            </li>
                                            @endif
                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>
                        @endforeach
                        @endif
                        <!-- End Single Item -->
                    </div>

                </div>

            </div>

        </div>

        <!-- End Chef Area -->



    <!-- Start Testimonials 

        ============================================= -->

        <div class="testimonials-area bg-gray carousel-shadow default-padding">

            <div class="container">

                <div class="row">

                    <div class="col-md-8 col-md-offset-2">

                        <div class="site-heading text-center">

                            <h3>{{__('messages.reviews')}}</h3>

                            <h2>{{__('messages.testimonials')}}</h2>

                            <p>

                                {{__('messages.testemo_str')}}

                            </p>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="testimonial-items testimonials-carousel owl-carousel owl-theme text-center">

                            <!-- Single Item -->
                            @if(isset($testimonials) && !empty($testimonials))
                            @foreach($testimonials as $testimonial)
                            <div class="item">
                                <!-- <h4>Delicious Burger</h4> -->
                                <p>
                                    {{$testimonial->description}} 
                                </p>
                                <div class="thumb">
                                    @if(!isset($testimonial->img_path))
                                    <img src="{{asset('public/front')}}/no-user.png" alt="not uploaded">
                                    @else
                                    <img src="{{asset('public/front/users')}}/{{$testimonial->img_path}}" alt="Thumb">
                                    @endif
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="clients-info">

                                    <h5>{{$testimonial->name}} </h5>

                                    <div class="rating">
                                        @php $stars = $testimonial->rate_star; @endphp
                                        @for($i=0;$i<5;$i++)
                                        @if($i < $stars)
                                        <i style="color: #eaa419" class="fas fa-star"></i>
                                        @else
                                        <i style="color: #eaa419" class="far fa-star"></i>
                                        @endif
                                        @endfor

                                    </div>

                                </div>

                            </div>
                            @endforeach
                            @endif
                            <!-- End Single Item -->

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- End Testimonials -->
        @include('front/layout/footer')