    @include('front/layout/header')

        <!-- Start Banner 
            ============================================= -->
              
                <section class="baner_new_panel">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-6">
                      <div class="content_baner_new">
                          <h1>{{ __('messages.Your_homemade') }}</h1>
                          <ul class="list-unstyled">
                             <li>{{ __('messages.Fill_your_fridge_click') }}</li>
                              <li>{{ __('messages.Choose_several') }}</li>
                              <li>{{ __('messages.Free_del') }}</li>
                          </ul>
                          <div class="button_baner">
                            <a href="https://cookforme.ch/meals">{{ __('messages.Order_now!') }}</a>
                          </div>
                      </div>
                    </div> 
                         
                         <div class="col-lg-6">
                         
                             <div class="right_baner_img">
                               <img src="https://cookforme.ch/public/front/img/cookforme logo blanc.png" class="img-responsive" alt="Image">
                             </div>
                         
                         </div>    
                         
                        </div> 
                 </div>
                </section>









         <section class="how_will_work_new_panel bg_img_sh">
                <div class="container">
                      <div class="site-heading text-center">
                          <h3>{{ __('messages.Discover') }}</h3>
                          <h2>{{ __('messages.HOW_IT_WORKS') }}</h2>
                      </div> 
                    
                     <div class="row">
                         <div class="col-md-3 col-sm-4 equal-height">
                            <div class="how_work_content">
                                <h5>1</h5>
                               <img class="img-fluid" src="{{ asset('public/front') }}/img/1how_works_menu_1.jpg" alt="image">
                                <h3>{{ __('messages.You_choose') }}</h3>
                                <p>{{ __('messages.a_sel_of_more') }}</p>
                                
                            </div>
                         </div>
                         <div class="col-md-3 col-sm-4 equal-height">
                            <div class="how_work_content">
                                 <h5>2</h5>
                               <img class="img-fluid" src="{{ asset('public/front') }}/img/how_works_cook_2.jpg" alt="image">
                                <h3>{{ __('messages.We_cook') }}</h3>
                                <p>{{ __('messages.Our_chef_Greg_will') }}</p>
                            </div>
                         </div>
                          <div class="col-md-3 col-sm-4 equal-height">
                            <div class="how_work_content">
                                 <h5>3</h5>
                               <img class="img-fluid" src="{{ asset('public/front') }}/img/how_works_delivery_3.jpg" alt="image">
                                <h3>{{ __('messages.We_deliver') }}</h3>
                                <p>{{ __('messages.All_your_dishes') }}</p>
                            </div>
                         </div>
                         <div class="col-md-3 col-sm-4 equal-height">
                            <div class="how_work_content">
                                 <h5>4</h5>
                               <img class="img-fluid" src="{{ asset('public/front') }}/img/4how_works_eat_4.jpg" alt="image">
                                <h3>{{ __('messages.You_taste') }}</h3>
                                <p>{{ __('messages.It_only_takes') }}</p>
                            </div>
                         </div>
                     </div>
                    
                </div>
         </section>


<!--
        <section class="how_its_work">
            <div class="container">
                <div class="site-heading text-center">
                    <h3>Discorver</h3>
                    <h2>How it works</h2>
                    <div class="row grids-w3 py-xl-5 py-lg-4 pt-lg-0 pt-4">
                        <div class="col-lg-5 w3pvt-lauits_banner_bottom_left">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 wthree_banner_bottom_grid_right text-right">
                                    <h4 class="mb-3"><a href="{{route('customer-login')}}">CHOOSE YOUR MEALS</a></h4>
                                    <p>30+ menu of all-natural dishes.</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 wthree_banner_bottom_grid_left text-lg-right text-center">
                                    <img src="{{ asset('public/front') }}/img/s1.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 w3pvt-lauits_banner_bottom_left">

                        </div>
                        <div class="col-lg-5 w3pvt-lauits_banner_bottom_left mt-lg-0 mt-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 wthree_banner_bottom_grid_left text-lg-right text-center">
                                    <img src="{{ asset('public/front') }}/img/s2.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 wthree_banner_bottom_grid_right right_cl_sk">
                                    <h4 class="mb-3"><a href="{{route('customer-login')}}">WE COOK & DELIVER</a></h4>
                                    <p>Cooked by chefs and sent fresh..</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row grids-w3 py-xl-5 py-lg-4 mt-lg-0 mt-4">
                        <div class="col-lg-4 w3pvt-lauits_banner_bottom_left">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 wthree_banner_bottom_grid_right text-right pl-lg-0">
                                    <h4 class="mb-3"><a href="{{route('customer-login')}}">YOU HEAT ‘EM UP</a></h4>
                                    <p>Ready to eat in 3 minutes.</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 wthree_banner_bottom_grid_left text-lg-right text-center pr-lg-0">
                                    <img src="{{ asset('public/front') }}/img/s3.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 w3pvt-lauits_banner_bottom_left pr-0">

                        </div>
                        <div class="col-lg-4 w3pvt-lauits_banner_bottom_left mt-lg-0 mt-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 wthree_banner_bottom_grid_left text-lg-right text-center pl-lg-0">
                                    <img src="{{ asset('public/front') }}/img/s4.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 wthree_banner_bottom_grid_right pr-lg-0 right_cl_sk">
                                    <h4 class="mb-3"><a href="{{route('customer-login')}}">EAT & REPEAT</a></h4>
                                    <p>Skip a week or cancel at any time.</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        
-->


        <!-- Start Food Menu
            ============================================= -->
            <div class="food-menu-area bg-gray simple default-padding bg_img_sh">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="site-heading text-center">
                                <h3>{{ __('messages.Discover') }}</h3>
                                <h2>{{ __('messages.THE_MENU') }}</h2>
                                <p>
                                    
                                </p>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="menu-lists text-center name_cl_make_baner">
                            <!-- Single Item -->
                   <!--  <div class="col-md-3 col-sm-4 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/menu/1.jpg" alt="Thumb">
                                </a>
                               
                            </div>
                            <div class="info">
                                <h4><a href="#">Crispy Crust Pizzeria</a></h4>
                              
                                <p>
                                    Considered introduced themselves mr to discretion at. Means among saw hopes for. Death mirth in oh learn he equal on.
                                </p>
                                <br>
                                <a class="btn circle btn-theme border btn-md" href="#">View More</a>
                               
                            </div>
                        </div>
                    </div> -->
                    <!-- End Single Item -->
                    <!-- Single Item -->
                <!--    <div class="col-md-3 col-sm-4 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/menu/2.jpg" alt="Thumb">
                                </a>
                              
                            </div>
                            <div class="info">
                                <h4><a href="#">Luger Burger</a></h4>
                               
                                <p>
                                    Considered introduced themselves mr to discretion at. Means among saw hopes for. Death mirth in oh learn he equal on.
                                </p>
                                 <br>
                                <a class="btn circle btn-theme border btn-md" href="#">View More</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Single Item -->
                    <!-- Single Item -->
                <!--   <div class="col-md-3 col-sm-4 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/menu/3.jpg" alt="Thumb">
                                </a>
                             
                            </div>
                            <div class="info">
                                <h4><a href="#">Fries McDonald's</a></h4>
                               
                                <p>
                                    Considered introduced themselves mr to discretion at. Means among saw hopes for. Death mirth in oh learn he equal on.
                                </p>
                                 <br>
                                <a class="btn circle btn-theme border btn-md" href="#">View More</a>
                             
                            </div>
                        </div>
                    </div> -->
                    <!-- End Single Item -->
                    <!-- Single Item -->
                     <!-- <div class="col-md-3 col-sm-4 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/menu/4.jpg" alt="Thumb">
                                </a>
                             
                            </div>
                            <div class="info">
                                <h4><a href="#">Chicken Popeyes</a></h4>
                               
                                <p>
                                    Considered introduced themselves mr to discretion at. Means among saw hopes for. Death mirth in oh learn he equal on.
                                </p>
                                 <br>
                                <a class="btn circle btn-theme border btn-md" href="#">View More</a>
                              
                            </div>
                        </div>
                    </div> -->
                    <!-- End Single Item -->
                    <!-- Single Item -->
                     <!--  <div class="col-md-3 col-sm-4 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/menu/5.jpg" alt="Thumb">
                                </a>
                                
                            </div>
                            <div class="info">
                                <h4><a href="#">Chicken Sandwich</a></h4>
                                <p>
                                    Considered introduced themselves mr to discretion at. Means among saw hopes for. Death mirth in oh learn he equal on.
                                </p>
                                 <br>
                                <a class="btn circle btn-theme border btn-md" href="#">View More</a>
                              
                            </div>
                        </div>
                    </div> -->
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <!--   <div class="col-md-3 col-sm-4 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/menu/6.jpg" alt="Thumb">
                                </a>

                            </div>
                            <div class="info">
                                <h4><a href="#">Salmon Steak</a></h4>
                               
                                <p>
                                    Considered introduced themselves mr to discretion at. Means among saw hopes for. Death mirth in oh learn he equal on.
                                </p>
                                <br>
                                <a class="btn circle btn-theme border btn-md" href="#">View More</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Single Item -->
                    <!-- Single Item -->
                  <!-- <div class="col-md-3 col-sm-4 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ asset('public/front') }}/img/menu/3.jpg" alt="Thumb">
                                </a>
                             
                            </div>
                            <div class="info">
                                <h4><a href="#">Fries McDonald's</a></h4>
                               
                                <p>
                                    Considered introduced themselves mr to discretion at. Means among saw hopes for. Death mirth in oh learn he equal on.
                                </p>
                              <br>
                                <a class="btn circle btn-theme border btn-md" href="#">View More</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Single Item -->
                    @if(isset($menus) && !empty($menus))
                    @foreach ($menus as $menu)
                  
                     @if(isset($img_array)&&!empty($img_array)) 
                    @endif
                    @php
                    $img_array = json_decode($menu->menu_thumb, true);
                   @endphp
                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-4 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    @if(isset($img_array))
                                    <img src="{{ asset('public/uploads') }}/menus/{{$img_array[0] ?? ''}}" alt="Thumb">
                                    @endif
                                   
                                </a>
                                <div class="price">
                                    <h5>CHF {{$menu->price}}</h5>
                                </div>
                            </div>
                            <div class="cust_info_home">
                                <h4>{{ $menu->translation()->first()?$menu->translation()->first()->menu_name:$menu->menu_name,0,20 }}</h4>

                                <p>
                                    {{$menu->translation()->first()?$menu->translation()->first()->menu_name:$menu->sort_description}}
                                </p>
                               
                                <a class="btn circle btn-theme border btn-md" href="{{route('meals')}}">{{ __('messages.view_more') }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @endforeach
                    @endif

                </div>
                
            </div> 

              <!--   <div class="row">
                    <div class="menu-lists text-center name_cl_make_baner">
                       
                        @foreach ($menus as $menu)
                        @php
                             $img_array = json_decode($menu->menu_thumb, true);
                        @endphp
                        <div class="col-md-3 col-sm-4 equal-height">
                            <div class="item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{ asset('public/uploads') }}/menus/{{$img_array[0]}}" alt="Thumb">
                                    </a>
                                </div>
                                <div class="info">
                                    <h4><a href="#">{{ $menu->menu_name }}</a></h4>
                                
                                    <p>
                                    {{ $menu->sort_description }}
                                    </p>
                                
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div> -->

                <div class="" style="text-align: center;">
                    <a class="btn btn-theme effect btn-md" href="{{route('meals')}}">{{ __('messages.SEE_ALL_DISHES')}}</a>
                </div>
            </div>
        </div>
        <!-- End Food Menu -->

        <!-----PLAN----->    
       <!--  <div class="food-menu-area bg-white simple default-padding bg_img_sh">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h3>Discorver</h3>
                            <h2>Plans that work for you</h2>
                            <p>
                                Choose from 4, 6, 9, or 12 meals per week. You can change up your number of meals with every order if you’d like.
                            </p>
                        </div>
                    </div>
                </div>
                <div id="pricing-table" class="clear">
                     @if(isset($plans) && !empty($plans))
                    @foreach ($plans as $plan)
                    <div class="plan">
                        <h3>{{ $plan->plan_name }}
                            <span>
                                {{ $plan->plan_meal_type }}
                            </span>
                        </h3>
                        <ul>
                            <li><b>{{ $plan->plan_per_meal_price }}/ MEAL</b></li>
                            <li><b>{{ $plan->plan_price }}/ WEEK</b></li>       
                        </ul> 
                        <a class="signup" href="{{url('join-now?plan_id='.$plan->id)}}">CHOOSE</a>         
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div> -->
        
        
        
        
        
        <!-- Start Video BG 
            ============================================= -->
            <div class="video-bg-area text-center shadow dark text-light video-bg-live bg-fixed" style="background-image: url({{ asset('public/front') }}/img/banner/DSC00569.jpg);">
                <div class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=hoiGV-N-2Gs',containment:'.video-bg-live', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:5, opacity:1, quality:'default'}"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1>{{ __('messages.Fill_your_fridge_dis')}}</h1>
                            <a class="btn btn-theme effect btn-md" href="{{route('meals')}}">{{ __('messages.ORDER')}}</a>
                        </div>
                    </div>
                </div>
                <!-- Shape -->
                <div class="wavesshape">
                    <img src="{{ asset('public/front') }}/img/shape.png" alt="Shape">
                </div>
                <!-- Shape -->
            </div>
            <!-- End Video BG -->
            <div class="about-area default-padding">
                <div class="container">
                    <div class="row">
                        <div class="about-items">
                            <div class="col-md-6 thumb">
                                <img src="{{ asset('public/front') }}/img/about/elio_carlotte.jpg" alt="Thumb">

                            </div>
                            <div class="col-md-6 info">
                                <h3>{{ __('messages.Our_history')}}</h3>
                                <p>
                                    Nous sommes Charlotte et Elio, un couple de trentenaire qui en a eu assez des repas du midi avec un sandwich et des dîners pizza ou sushi.
                                <br>
                                    Pour stopper cette mal bouffe, nous avons dû nous mettre à cuisiner, mais nous nous sommes vite aperçus que ce n’était pas si simple sur la durée!
                                <br>
                                    En effet nous devions: Programmer nos repas - Faire la liste des courses - Courir aux supermarchés juste avant la fermeture des portes - Nous mettre à cuisiner…et finir par la corvée du nettoyage!!!
                                <p>
                                    A l’arrivée, nous y passions beaucoup de temps, au détriment de nos soirées. Nos bons petits plats maison : Oui. La corvée de la cuisine: Non!
                                </p>
                                    Nous avons constaté nous n’étions pas les seuls dans cette situation et que beaucoup d’entre nous étaient d’accord pour bien manger chez eux ou au bureau sans pour autant passer trop de temps à cuisiner.
                                <br>
                                <p>
                                    Forts de ce constat, Cook for me est née!
                                </p>
                              
                            </div>
                            
                            <div class="col-md-12 info">
                               <p>
                                    Cook for me: Un service de plats faits maison de qualité et livrés à domicile ou au bureau.
                                </p>
                                <p>
                                    Greg, notre chef cuisinier, un amoureux des saveurs et des couleurs nous a rejoints pour participer à cette aventure gustative. Son leitmotiv, partager son art de la cuisine et faire que bien manger à domicile ou au bureau soit  simple pour tous.
                                </p>
                                <p>
                                    Cook for me c'est for-me-dable!
                                </p>

                            
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            @include('front/layout/footer')