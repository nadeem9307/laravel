
@include('front/layout/header')
<section class="plans_and_menu">
  <div class="container">
    <div class="three_menu_item">
      <div class="row no-guttres">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <div class="panel_plans_menu here_nxt_icon">
           <img class="img-responsive" src="{{ asset('public/front') }}/img/teriyaki_3x_sa4pxi.png" alt="image">
           <h1>{{ __('messages.The_map') }}</h1>
           <p>{{ __('messages.The_map_str') }}</p>
         </div>
       </div>
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="panel_plans_menu here_nxt_icon">
         <img class="img-responsive" src="{{ asset('public/front') }}/img/tray-meal_3x_ni4ilo.png" alt="image">
         <h1>{{ __('messages.Products') }}</h1>
         <p>{{ __('messages.Products_content') }}</p>
       </div>
     </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="panel_plans_menu">
       <img class="img-responsive" src="{{ asset('public/front') }}/img/Packaging_DUNI.jpg" alt="image">
       <h1>{{ __('messages.Our_Packaging') }}</h1>
       <p>{{ __('messages.Our_Packaging_str') }}</p>
     </div>
   </div>
 </div>    
</div>
</div>
</section>
<div id="chef" class="food-menu-area bg-white simple default-padding bg_img_sh">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="site-heading text-center">
          <h3>Menu</h3>
          <h2>{{ __('messages.A_LA_CARTE') }}</h2>
          <p>
            JANVIER 2020
          </p>
        </div>
      </div>
    </div>

    <div class="text-center food-menu-content">
      <div class="mix-item-menu">
        <button class="active" data-toggle="pill" href="#all">{{ __('messages.all') }}</button>
        @if(isset($cats) && !empty($cats))
        @foreach($cats as $cat)
        <button data-toggle="pill" class="weekly_menu_sections_id" menuid="{{$cat->id}}" href="#{{$cat->id}}">{{$cat->name}}</button>
        @endforeach
        @endif

      </div>
      <div class="tab-content cust_css_tab_food">
       <div id="all" class="tab-pane fade in active">
         <div class="content_tab_section">
           <div class="row">
            @if(isset($menus) && !empty($menus))
            @foreach ($menus as $menu)
            @php
            $img_array = json_decode($menu->menu_thumb, true);
            @endphp
            <div class="menu-lists col-md-3 col-sm-4 margine_bottom_cl">
                
              <div class="item">
                  
                <div class="view-modal-plans" mealid="{{$menu->id}}">
                <div class="thumb">
                  <a href="javascript:void(0)">
                    <img src="{{ asset('public/uploads') }}/menus/{{$img_array[0] ?? ''}}" alt="Thumb">
                  </a>
                  <div class="price">
                    <h5>CHF {{$menu->price}}</h5>
                  </div>
                </div> 


                <div class="cust__food_plans_palne">
                 <h4><a href="javascript:void(0)">{{ $menu->translation()->first()?$menu->translation()->first()->menu_name:$menu->menu_name }}</a></h4>
                 <p>{{ $menu->translation()->first()?$menu->translation()->first()->sort_description:$menu->sort_description }}</p>    
                 <a class="btn circle btn-theme border btn-md mahy__de" href="javascript:void(0)">{{ __('messages.view_more_details')}}</a>

<!--
                 <ul class="list-inline her__sere_sjhf">
                   <li>
                    <a href="{{url('join-now?meal_id='.$menu->id)}}"><i class="fa fa-plus" aria-hidden="true"></i></a>  
                  </li> 
                  <li>
                   
                 </li>    
               </ul>
-->
             </div> 
                  </div>        
                    <div class="buy duet__but__sndg" >
                      @if(Auth::user())
                      <form method="post" action="{{ url('delivery') }}" class="form-inline" role="form">
                           <input class="form-control" id="zip" name="zip" placeholder="Zip code*" type="hidden" value="{{Auth::user()->zip_code}}">
                            <input class="form-control" id="email" name="email" placeholder="Email*" type="hidden" value="{{Auth::user()->email}}">
                     
                      @elseif(isset($email) && isset($zip))
                        <form method="post" action="{{ url('delivery') }}" class="form-inline" role="form">
                           <input class="form-control" id="zip" name="zip" placeholder="Zip code*" type="hidden" value="{{$zip}}">
                            <input class="form-control" id="email" name="email" placeholder="Email*" type="hidden" value="{{$email}}">
                          @else
                          <form method="get" action="{{ URL::to('join-now') }}" class="form-inline" role="form">
                          @endif
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{ $menu->id}}">
                            <button type="submit" class="btn btn-primary">{{ __('messages.add_to_cart') }}</button>
                        </form>
                    </div>
           </div>
         </div>
     
         @endforeach
         @endif
       </div>   
     </div>
   </div>
   @if(isset($cats) && !empty($cats))
   @foreach($cats as $cat)
   <div id="cat_{{$cat->id}}" class="tab-pane fade">
   </div>
   @endforeach
   @endif
 </div> 
</div>
</div>
</div>

<!-------MODEL------>
<section class="model_section_content_wrpa">   

</section> 
@include('front/layout/footer')
