    <div class="container">
      <!-- Large modal -->
      <div class="modal fade bs-example-modal-lg nw_model_inner_sec"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-content">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <div class="header_cl_slider_wrpa">
                    <div class="header_slider_panel">
                      <h1>{{$menus->translation()->first()?$menus->translation()->first()->menu_name:$menus->menu_name}}</h1>
                      @php
                      $thumbs = json_decode($menus->menu_thumb, true);
                      @endphp
                      <p>{{$menus->translation()->first()?$menus->translation()->first()->sort_description:$menus->sort_description}} <button class="btn hare_add_cl_nsbg add-to-order" menu-id="{{$menus->id}}" menu-thumb="{{$thumbs[0]}}" menu-name="{{$menus->translation()->first()?$menus->translation()->first()->menu_name:$menus->menu_name}}" limit="{{$limit}}" menu-desc="{{$menus->translation()->first()?$menus->translation()->first()->sort_description:$menus->sort_description}}">+ Add</button></p>
                      @php
                      $features = explode(",",$menus->features);
                      @endphp
                      <ul class="list-inline">
                        @if(isset($features)&&!empty($features))
                        @foreach($features as $fet)
                        <li><span style="background-color: #eafdff; color: #589aaf;">{{$fet}}</span></li>
                        @endforeach
                        @endif
                      </ul>
                    </div>
                    <div class="content_slider_grid_cl">
                      <div class="row m-0">
                        <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                          <div class="img__choose_apenl">
                            <ul class="list-unstyled">
                             @if(isset($thumbs)&&!empty($thumbs))
                             @foreach($thumbs as $thumb)
                             <li>
                              <img class="img-responsive" src="{{ asset('public/uploads') }}/menus/{{$thumb}}" alt="image">
                            </li>
                            @endforeach
                            @endif
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                        <div class="right_cl_make_adem">

                          <div class="firdst__com__ae">
                            <h1>{{ __('messages.what_makes_this_dish_special') }}</h1>
                            <ul class="list-unstyled">
                              {{$menus->translation()->first()?$menus->translation()->first()->sort_description:$menus->sort_description}}
                            </ul>
                          </div>
                        </div>
                        <div class="second_ad_make_te">
                          <h2>{{ __('messages.Ingredients') }}</h2>
                          <ul class="list-inline here_sawer_s">
                            @php
                            $all_ing = '';
                            $i = 0;
                            $len = count($menus->ingredent);
                            @endphp
                            @if(isset($menus)&&!empty($menus))
                            @foreach($menus->ingredent as $ing)
                            <li> <img class="img-responsive" src="{{ asset('public/uploads') }}/ingredents/{{$ing->thumb}}" alt="image"></li>
                            @php
                            if ($i == $len - 1) {
                            $all_ing .= $ing->name.'('.$ing->description.').';  
                          }else{
                          $all_ing .= $ing->name.'('.$ing->description.'),';
                        }
                        $i++;
                        @endphp
                        @endforeach
                        @endif
                      </ul>
                      <div class="btn_see_more_sec">
                        <button type="button" class="show_ingdie_cl">{{ __('messages.Show_all_ingredients') }}<i class="fa fa-plus" aria-hidden="true"></i></button>
                      </div>
                    </div>
                    <div class="second_ad_make_te first_hide_data">
                      <h4>{{ __('messages.All_ingredients') }}</h4>
                      <p>{{$all_ing}}</p>
                    </div>
                    <div class="second_ad_make_te">
                      <h2>{{ __('messages.Whats_inside') }}</h2>
                      <ul class="list-unstyled pre_nutrition">
                        <li>
                          <p>{{ __('messages.Calories') }}<span>{{$menus->calories}}</span></p>
                          <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                              40%
                            </div>
                          </div>
                        </li>
                        @php
                        $nutrition_facts = json_decode($menus->nutrition_facts,true);    
                        $color_array = array('success', 'info', 'warning','danger');
                        $x=0;
                        @endphp
                        @if(isset($nutrition_facts)&&!empty($nutrition_facts))
                        @foreach($nutrition_facts as $key => $value)
                        <li>
                          <p>{{$key}}</p>
                          @php
                          $val = substr($value, 0, -1);
                          $x++;
                          $class = $color_array[$x%3];
                          @endphp
                          <div class="progress">
                            {{$x}}
                            <div class="progress-bar progress-bar-{{$class}} progress-bar-striped" role="progressbar" aria-valuenow="{{$val}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$val}}%">
                              {{$value}}
                            </div>
                          </div>
                        </li>
                        @php
                        if ($x === 3){
                        break;
                      }
                      @endphp 
                      @endforeach
                      @endif
                    </ul>
                    <div class="btn_see_more_sec">
                      <button type="button" class="sec_click_btn">{{ __('messages.Show_all_Nutrition')}} <i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="second_ad_make_te hide_datta">
                    <h3>{{ __('messages.Nutrition_Facts') }}</h3>
                    <div class="small_cl_makeing_new">
                      <small>1 {{ __('messages.Serving_Per_Container') }}</small>
                      <p>{{ __('messages.Serving_Size') }} <b>{{$menus->serving_size}}</b></p>
                      <hr>
                      <b>{{ __('messages.Amount_Per_Serving') }}</b>
                    </div>
                    <div class="sec ond_file_make">
                      <h3>{{ __('messages.Calories') }} <b>{{$menus->calories}}</b></h3>
                    </div>
                    <table class="table discription_table_here">
                      <tbody>
                        <tr>
                          <th colspan="2" class="text_right_cl">% {{ __('messages.Daily_Value') }}*</th>
                        </tr>
                         @if(isset($nutrition_facts)&&!empty($nutrition_facts))
                        @foreach($nutrition_facts as $key => $value)
                        <tr>
                          <th>{{$key}}</th>
                          <td>{{$value}}</td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>

                    <div class="here__shsfd__sss">
                      <p>{!! $menus->translation()->first()?$menus->translation()->first()->description:$menus->description !!}</p>
                      <span>{{$menus->translation()->first()?$menus->translation()->first()->information:$menus->information}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="fa fa-angle-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="fa fa-angle-right" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<script>
  $(".show_ingdie_cl").click(function(){
    $(".first_hide_data").toggleClass("show_dektop_menu");
    $(".btn_see_more_sec i").toggleClass("fa-minus");
  });    
  $(".sec_click_btn").click(function(){
   $(".hide_datta").toggleClass("show_dektop_menu");
   $(".btn_see_more_sec i").toggleClass("fa-minus");
 });  
  function minMaxId(selector) {
    var min=null, max=null;
    $(selector).each(function() {
      var id = parseInt(this.id, 10);
      if ((min===null) || (id < min)) { min = id; }
      if ((max===null) || (id > max)) { max = id; }
    });
    return {min:min, max:max};
  }
  var menu = [];
  function insertarr(id,name,thumb,dsc) {
    menu.push({
      id: id,
      name: name,
      thumb: thumb,
      dsc: dsc
    }); 
  }
  $('.add-to-order').click(function(){
    var free_frame = minMaxId('.free');
    var thumb = $(this).attr('menu-thumb');
    var name = $(this).attr('menu-name');
    var menuid = $(this).attr('menu-id');
    var dsc = $(this).attr('menu-desc');
    insertarr(menuid,name,thumb,dsc);
    $("input[name=menu]").val(JSON.stringify(menu));
    var html = '<img class="img-fluid frame_cl_img" src="{{asset("public/front")}}/img/frame.png" alt="image"><div class="content_my_delv"><img class="img-fluid cart_sgret" src="{{asset("public/uploads") }}/menus/'+thumb+'" alt="image"><p>'+name+'</p><a href="#" menuid="'+menuid+'" minid="'+free_frame.min+'" class="cross_cl"><i class="fa fa-times" aria-hidden="true"></i></a></div>';
    console.log(free_frame);
    $("#"+free_frame.min).html(html);
    $("#"+free_frame.min).removeClass('free');
    $("#"+free_frame.min).addClass('busy');
    var rmain = (parseInt(free_frame.max, 10)+1)-(parseInt(free_frame.min, 10)+1)
    $('.red_cl_mh').html(parseInt(free_frame.min, 10)+1);
    $('#counth1').html("Add "+rmain+" meals to continue.");
  });  
  // $( "div" ).delegate( ".cross_cl", "click", function() {
  //   /* start removing of objects */
  //   var menuid = $(this).attr('menuid');
  //   var jsonObj = $.parseJSON($("input[name=menu]").val());
  //   $.each(jsonObj, function (i,v)
  //   {
  //     if(v!==null){
  //       if(v.id===menuid)
  //       delete jsonObj[i];
  //   }
  //   });
  //   $("input[name=menu]").val(JSON.stringify(jsonObj));
  //   /* end removing of objects */
  //   var minid = $(this).attr('minid');
  //   var html ='<li class="free" id="'+minid+'"><img class="img-fluid frame_cl_img" src="{{asset("front")}}/img/frame.png" alt="image"></li>';
  //   var addedmeal = $('.red_cl_mh').text();
  //   $("#"+minid).removeClass('free');
  //   $("#"+minid).addClass('free');
  //   $("#"+minid).html(html);
  //   $('.red_cl_mh').html(parseInt(addedmeal, 10)-1);
  //   var rmain = (parseInt(addedmeal, 10)-1)
  //   $('#counth1').html("Add "+rmain+" meals to continue.");
  // });  

</script>