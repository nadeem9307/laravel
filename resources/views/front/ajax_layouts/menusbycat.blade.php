<div class="content_tab_section">
 <div class="row">
  @if(isset($menus) && !empty($menus))
  @foreach ($menus as $menu)
  @php
  $img_array = json_decode($menu->menu_thumb, true);
  @endphp
  <div class="menu-lists col-md-3 col-sm-4 margine_bottom_cl view-modal-plans" mealid="{{$menu->id}}">
    <div class="item">
      <div class="thumb">
        <a href="javascript:void(0)">
          <img src="{{ asset('public/uploads') }}/menus/{{$img_array[0]}}" alt="Thumb">
        </a>
        <div class="price">
          <h5>CHF {{ $menu->price }}</h5>
        </div>
      </div>

      <div class="cust__food_plans_palne">
       <h4><a href="javascript:void(0)">{{ $menu->translation()->first()?$menu->translation()->first()->menu_name:$menu->menu_name }}</a></h4>
       <p>{{ $menu->translation()->first()?$menu->translation()->first()->sort_description:$menu->sort_description }}</p>    
       <a class="btn circle btn-theme border btn-md mahy__de view-modal-plans" menuid="{{$menu->id}}" href="javascript:void(0)">{{ __('messages.view_more_details') }}</a>    <br>
       <ul class="list-inline her__sere_sjhf">
     <!--  <li>
        <a href="{{url('join-now?meal_id='.$menu->id)}}"><i class="fa fa-plus" aria-hidden="true"></i></a>  
      </li> -->
      <li>
       <a href="{{url('join-now?meal_id='.$menu->id)}}">{{ __('messages.add_to_cart') }}</a>
     </li>    
   </ul>
   <br>

 </div> 
</div>
</div>

@endforeach
@endif
</div>   
</div>









