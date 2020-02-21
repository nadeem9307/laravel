@include('front/layout/header')
<section class="profile_panel_cl">
  <div class="container">
    <div class="row profile">
      <div class="col-lg-3 col-md-3 col-sm-4">
       <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          @if(!empty($users['img_path']))
          <img src="{{asset('public/front/users/').'/'.$users['img_path']}}" class="img-responsive" alt="user image">

          @else
          <img src="{{asset('public/front')}}/img/no-user.png" class="img-responsive" alt="no image">
          @endif
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
         <div class="profile-usertitle-name">
          {{Auth::user()->first_name.' '.$users['last_name']}}
          <p><b> {{__('messages.Email')}}:</b> {{$users['email']}}</p>
        </div>

        <div class="logout_profile">
         <a href="{{route('customer-logout')}}"><i class="fas fa-sign-in-alt"></i> {{__('messages.Logout')}}</a>
       </div>

     </div>
     <!-- END SIDEBAR USER TITLE -->

     <!-- SIDEBAR MENU -->
     <div class="profile-usermenu">
       <ul class="nav">

         <li class="active">
           <a data-toggle="pill" href="#editprofile">
             <span><img class="img-fluid" src="{{asset('public/front')}}/img/user_edit.png" alt="image"></span>  {{__('messages.edit_profile')}} 
           </a>
         </li>   

    <!--
        <li>
         <a href="#adresses" data-toggle="pill">
           <span><img class="img-fluid" src="{{asset('public/front')}}/img/address.png" alt="image"></span>	Adresses  
         </a>
       </li>
     -->

     <li>
       <a data-toggle="pill" href="#cards">
         <span><img class="img-fluid" src="{{asset('public/front')}}/img/bank.png" alt="image"></span> {{__('messages.cards')}} 
       </a>
     </li>

     <li>
       <a data-toggle="pill" href="#myorders">
         <span><img class="img-fluid" src="{{asset('public/front')}}/img/check.png" alt="image"></span> {{__('messages.my_order')}} 
       </a>
     </li>

     <li>
       <a data-toggle="pill" href="#mycomments">
         <span><img class="img-fluid" src="{{asset('public/front')}}/img/comments.png" alt="image"></span> {{__('messages.comments')}} 
       </a>
     </li>


   </ul>
 </div>
 <!-- END MENU -->
</div>
</div>
<div class="col-lg-9 col-md-9 col-sm-8">
  <div class="tab-content">
   <div class="profile-content">

     <div id="editprofile" class="tab-pane fade in active">
      <div class="tab_content_cl_nam">
        <h1>{{__('messages.edit_profile')}}</h1>
      </div>
      <div class="profile_edit_tab">
       <form action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="name"> {{__('messages.name')}}:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Complete Name" Value="{{$users['name']}} ">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="f_name">{{__('messages.First_Name')}}:</label>
              <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter First Name" Value="{{$users['first_name']}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="l_name">{{__('messages.Lirst_Name')}}:</label>
              <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter Last Name" Value="{{$users['last_name']}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">{{__('messages.Email')}}:</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" Value="{{$users['email']}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone">{{__('messages.mobile')}}:</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Contact" Value="{{$users['phone']}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="add_1">{{__('messages.address_1')}}:</label>
              <textarea class="form-control" name="add_1" rows="2" id="add_1" required="">{{$users['address_line_1']}}</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="subject">{{__('messages.address_2')}}:</label>
              <textarea class="form-control" name="add_2" rows="2" id="add_2" required="">{{$users['address_line_2']}}</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="state">{{__('messages.state')}}:</label>
              <input type="text" class="form-control" id="state" name="state" placeholder="Enter State name" Value="{{$users['state']}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="city">{{__('messages.city')}}:</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Enter City name" Value="{{$users['city']}}">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="zip">{{__('messages.zip')}}:</label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Postal Zip" Value="{{$users['zip_code']}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="image">{{__('messages.image')}}:</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group text-right">
              <button type="submit" class="btn btn-info">{{__('messages.update')}}</button>
            </div>
          </div>
        </div>  
      </form>
    </div>
  </div>
<!--
        <div id="adresses" class="tab-pane fade ">
      <div class="tab_content_cl_nam">
        <h1>Address Info</h1>
        <div class="address_contair">

          <div class="address-items">
           <div class="row">
         
            <div class="col-md-6 col-sm-6 equal-height" style="height: 128px;">
              <div class="item mak__derw">
                <div class="icon"><i class="fas fa-map-marked-alt"></i></div> 
                <span>{{$users['address_line_1']}}, {{$users['city']}}, {{$users['state']}},{{$users['zip_code']}}</span>
              </div>
            </div>
        
            <div class="col-md-6 col-sm-6 equal-height" style="height: 102px;">
              <div class="item mak__derw">
                <div class="icon"><i class="fas fa-phone"></i></div> 
                <span>{{$users['phone']}}</span>
              </div>
            </div>
         
          </div>
        </div>

      </div>
    </div>
  </div>  
       
-->
<div id="cards" class="tab-pane fade">
  <div class="tab_content_cl_nam">
    <h1>Card Information</h1>
    @if(isset($orders) && !empty($orders))
    @foreach($orders as $order)
    <div class="stripe_card_details">
      <div class="form_header_stripe">
        <h4 class="title"><span><img class="img-fluid" src="{{asset('public/front')}}/img/payment-bank-stripe-card-icon.svg" alt="image"></span> {{__('messages.stripecarddet')}}</h4>
      </div>
      <div class="card_panel_info">
        <h5>John Decosta</h5>
        <input type="text" class="card-number" value="{{substr($order->card_details,0,12)}}XXXX" placeholder="1234 5678 9XXXXX">
      </div>
    </div>  
    @endforeach
    @endif  
  </div>
</div>
<div id="myorders" class="tab-pane fade">
  <div class="tab_content_cl_nam">
    <h1>{{__('messages.my_order')}}</h1>
  </div>
  <div class="my_order_sec_one_table">
   @if(isset($orders) && !empty($orders))
   @foreach($orders as $order)
   <div class="table-responsive">
     <table class="table">
       <tbody>
        <tr>
         <td class="order_id_sec" colspan="3">
          <a href="javascript:void(0)" itemid="{{$order->order_id}}" class="order_modal">{{__('messages.order_id')}} # {{$order->order_id}}</a>
        </td>    

      </tr>
      <tr class="img_pro__cl_maj">
        <td>
          <b>{{__('messages.order_date')}}:</b> {{date("d-m-Y", strtotime($order->order_date))}}
        </td>
        <td><b>{{__('messages.order_status')}}:</b> {{$order->order_status}}</td>
        <td><b>{{__('messages.del_add')}}:</b> {{$order->full_name}} {{$order->address_line_1}} {{$order->zip_code}}</td>
      </tr>
      <tr class="deli_bver">
        <td colspan="2"><b>{{__('messages.payment')}}:</b><span class="compl_order_cl"> {{$order->payment_status}}</span>

         @if($order->order_status == 'Delivered')
         @php $exist = App\Helpers\Helper::CustomerReviewExist($order->order_id); @endphp
         @if($exist)
         @php $data = App\Helpers\Helper::CustomerReviewRating($order->order_id); $stars = $data[0]; @endphp

         <strong style="float: right;">
           @for($i=0;$i<5;$i++)
           @if($i < $stars)
           <i style="color: #eaa419" class="fas fa-star"></i>
           @else
           <i style="color: #eaa419" class="far fa-star"></i>
           @endif
           @endfor
         </strong>  
         @else
         <strong class="review_click" orderid="{{$order->order_id}}">Please Rate</strong>  
         @endif
         @endif    
       </td>
       <td class="ti_tras_ot">{{__('messages.Order_Tot')}} <b>CHF {{$order->order_total}}</b></td>    
     </tr>
   </tbody>
 </table>
</div>
{{ $orders->links() }}
@endforeach
@endif
</div>
</div>
<div id="mycomments" class="tab-pane fade">
  <div class="tab_content_cl_nam">
    <h1>{{__('messages.comments')}}</h1>
  </div>
  <div class="content__form_comment">
   <div class="wrap_dta_comment">
     <form action="{{route('post-comment')}}" method="post">
      @csrf
      <div class="form-group">
       <label for="subject">{{__('messages.subject')}}:</label>
       <input type="text" class="form-control" id="subject" name="subject" placeholder="Ex: Query,Complaints etc." required="">
     </div>
     <div class="form-group">
       <label for="commnet">{{__('messages.comments')}}:</label>
       <textarea class="form-control" name="comment" rows="5" id="comment" required=""></textarea>
     </div>
     <div class="form-group text-right">
      <button type="submit" class="btn btn-info">{{__('messages.submit')}}</button>
    </div>
  </form>
</div>
<div class="table-responsive">
  <table class="table cust_table_cl__comm">
   <thead>
     <tr>
       <th>S.N</th>
       <th style="width: 26%;">{{__('messages.subject')}}</th>
       <th style="width: 42%;">{{__('messages.comments')}}</th>
       <th class="text-right">{{__('messages.commented_on')}}</th>
     </tr>
   </thead>
   <tbody>
    @if(isset($reviews) && !empty($reviews))
    @php $i = 1; @endphp
    @foreach($reviews as $review)
    <tr class="success">
     <td>{{$i}}</td>
     <td >{{$review->subject}}</td>
     <td >{{$review->description}}</td>
     <td class="text-right">{{$review->created_at}}</td>
   </tr>
   @php $i += 1; @endphp
   @endforeach
   @endif
 </tbody>
</table>
</div>   
</div>
</div>
</div>
</div>
</div>    
</div>
</div>
<section class="model_panel_order">
  <div class="modal fade" id="myModal_order" role="dialog">
  </div>
</section>   
<!---REVIEW MODEL--->    
<section class="panel_review_model">
 <!-- Modal -->
 <div class="modal fade" id="myModal_review" role="dialog">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Rete your order here for ORDER ID#</h4>
       </div>
       <div class="modal-body">
         <div class="wrap_data_star">
          <form action="javascript:void(0);">
           <div class="form-group">
             <label for="usr">Star Rating:</label>
             <div class="star-rating">
              <fieldset>
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Outstanding">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Very Good">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Good">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Poor">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Very Poor">1 star</label>
                <span id="rate-required" style="color: red;"></span>   
              </fieldset>
            </div>
          </div>
          <div class="form-group">
           <label for="usr">Description:</label>
           <textarea class="form-control" rows="4" name="desc"></textarea>
           <input type="hidden" name="orderid" value="">
         </div>     
         <div class="form-group submit_btn_cl">
          <button type="button" id="rate-submit" class="btn btn-info">Submit</button>
        </div>  
      </form>
    </div>
  </div>
</div>
</div>
</div>
</section>  
</section>    
@include('front/layout/footer')
